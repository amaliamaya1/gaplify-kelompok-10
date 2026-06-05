<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TestAttempt;
use App\Models\TestAnswer;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        // 1. Summary Metrics
        $studentsCount = User::where('role', 'student')->count();
        
        // Get latest attempt ID for each student
        $latestAttemptIds = TestAttempt::select(DB::raw('MAX(id) as max_id'))
            ->groupBy('user_id')
            ->pluck('max_id');
            
        $latestAttempts = TestAttempt::whereIn('id', $latestAttemptIds)->get();
        
        $averageScore = $latestAttempts->avg('score') ?? 0;
        $needsAssistance = $latestAttempts->where('score', '<', 70)->count();
        $testedStudents = $latestAttempts->count();

        // 2. Skill Gap Chart Data
        // Analyze answers from these latest attempts
        $skillGaps = [];
        if ($latestAttemptIds->isNotEmpty()) {
            $topicStats = DB::table('test_answers')
                ->join('questions', 'test_answers.question_id', '=', 'questions.id')
                ->join('topics', 'questions.topic_id', '=', 'topics.id')
                ->whereIn('test_answers.attempt_id', $latestAttemptIds)
                ->select(
                    'topics.title',
                    DB::raw('COUNT(test_answers.id) as total_answers'),
                    DB::raw('SUM(CASE WHEN test_answers.is_correct = 0 THEN 1 ELSE 0 END) as wrong_answers')
                )
                ->groupBy('topics.id', 'topics.title')
                ->get();
                
            foreach ($topicStats as $stat) {
                $percentage = $stat->total_answers > 0 
                    ? round(($stat->wrong_answers / $stat->total_answers) * 100) 
                    : 0;
                    
                $skillGaps[] = [
                    'topic' => $stat->title,
                    'wrong_percentage' => $percentage
                ];
            }
            
            // Sort by highest gap first
            usort($skillGaps, fn($a, $b) => $b['wrong_percentage'] <=> $a['wrong_percentage']);
        }

        // 3. Class Average Development (Dynamic Data - Limit to last 5 sessions)
        $allAttempts = TestAttempt::orderBy('created_at')->get();
        $userAttempts = $allAttempts->groupBy('user_id');
        
        // Limit each user's attempts to their latest 5
        $userAttempts = $userAttempts->map(function ($attempts) {
            return $attempts->take(-5)->values();
        });

        $maxAttempts = 0;
        foreach ($userAttempts as $userId => $attempts) {
            if ($attempts->count() > $maxAttempts) {
                $maxAttempts = $attempts->count();
            }
        }
        if ($maxAttempts == 0) $maxAttempts = 1; 
        if ($maxAttempts > 5) $maxAttempts = 5; // Hard limit to 5 just in case

        $labels = [];
        $class1Sum = array_fill(0, $maxAttempts, 0);
        $class1Count = array_fill(0, $maxAttempts, 0);
        $class2Sum = array_fill(0, $maxAttempts, 0);
        $class2Count = array_fill(0, $maxAttempts, 0);

        for ($i = 1; $i <= $maxAttempts; $i++) {
            $labels[] = "Tes $i";
        }

        foreach ($userAttempts as $userId => $attempts) {
            $isClass2 = ($userId % 2 === 0);
            $index = 0;
            foreach ($attempts as $attempt) {
                if ($index >= 5) break;
                if ($isClass2) {
                    $class2Sum[$index] += $attempt->score;
                    $class2Count[$index]++;
                } else {
                    $class1Sum[$index] += $attempt->score;
                    $class1Count[$index]++;
                }
                $index++;
            }
        }

        $class1Data = [];
        $class2Data = [];
        for ($i = 0; $i < $maxAttempts; $i++) {
            $class1Data[] = $class1Count[$i] > 0 ? round($class1Sum[$i] / $class1Count[$i]) : 0;
            $class2Data[] = $class2Count[$i] > 0 ? round($class2Sum[$i] / $class2Count[$i]) : 0;
        }

        $classAverages = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Siswa X TKJ 1',
                    'data' => $class1Data,
                    'backgroundColor' => '#2563EB',
                    'borderRadius' => 4,
                ],
                [
                    'label' => 'Siswa X TKJ 2',
                    'data' => $class2Data,
                    'backgroundColor' => '#06B6D4',
                    'borderRadius' => 4,
                ]
            ]
        ];

        return view('teacher.dashboard', compact(
            'studentsCount', 
            'averageScore', 
            'needsAssistance', 
            'testedStudents',
            'skillGaps',
            'classAverages'
        ));
    }
    
    public function students()
    {
        // Get all students with their test attempts
        $allStudents = User::where('role', 'student')->with('testAttempts')->get();
        
        $studentsData = [];
        foreach ($allStudents as $index => $student) {
            $latestAttempt = $student->testAttempts->sortByDesc('created_at')->first();
            
            $weakTopics = [];
            $status = 'Belum Tes';
            $score = '-';
            
            if ($latestAttempt) {
                $score = $latestAttempt->score;
                
                // Determine Status
                if ($score >= 85) {
                    $status = 'Sangat Baik';
                } elseif ($score >= 70) {
                    $status = 'Cukup';
                } else {
                    $status = 'Perlu Pendampingan';
                }
                
                // Find weak topics (score < 70% in that attempt)
                $topicScores = DB::table('test_answers')
                    ->join('questions', 'test_answers.question_id', '=', 'questions.id')
                    ->join('topics', 'questions.topic_id', '=', 'topics.id')
                    ->where('test_answers.attempt_id', $latestAttempt->id)
                    ->select(
                        'topics.title',
                        DB::raw('SUM(CASE WHEN test_answers.is_correct = 1 THEN 1 ELSE 0 END) as correct_count'),
                        DB::raw('COUNT(test_answers.id) as total_count')
                    )
                    ->groupBy('topics.id', 'topics.title')
                    ->get();
                    
                foreach ($topicScores as $ts) {
                    $topicPercentage = $ts->total_count > 0 ? ($ts->correct_count / $ts->total_count) * 100 : 0;
                    if ($topicPercentage < 70) {
                        $weakTopics[] = $ts->title;
                    }
                }
            }
            
            $studentsData[] = [
                'id' => $student->id,
                'name' => $student->name,
                'class' => ($student->id % 2 === 0) ? 'X TKJ 2' : 'X TKJ 1', // Mocked class
                'score' => $score,
                'status' => $status,
                'weak_topics' => $weakTopics,
            ];
        }

        return view('teacher.students.index', compact('studentsData'));
    }
    
    public function detailStudent($id)
    {
        $student = User::where('role', 'student')->findOrFail($id);
        $attempts = TestAttempt::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('teacher.students.detail', compact('student', 'attempts'));
    }

    public function studentAnalysis($id)
    {
        $student = User::where('role', 'student')->findOrFail($id);

        $latestAttempt = TestAttempt::with('testAnswers.question.topic')
            ->where('user_id', $id)
            ->whereNotNull('completed_at')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$latestAttempt) {
            return view('teacher.students.analysis', [
                'student' => $student,
                'hasTest' => false,
            ]);
        }

        // Calculate gap per topic
        $analysis = [];
        $topics = \App\Models\Topic::where('is_comprehensive', false)->get();

        $topicAnswers = [];
        foreach ($latestAttempt->testAnswers as $answer) {
            $topicId = $answer->question->topic_id;
            if (!isset($topicAnswers[$topicId])) {
                $topicAnswers[$topicId] = ['correct' => 0, 'total' => 0];
            }
            $topicAnswers[$topicId]['total']++;
            if ($answer->is_correct) {
                $topicAnswers[$topicId]['correct']++;
            }
        }

        foreach ($topics as $topic) {
            if (isset($topicAnswers[$topic->id])) {
                $total = $topicAnswers[$topic->id]['total'];
                $correct = $topicAnswers[$topic->id]['correct'];
                $percentage = $total > 0 ? round(($correct / $total) * 100) : 0;

                if ($percentage >= 70) {
                    $status = 'Dikuasai';
                } elseif ($percentage >= 50) {
                    $status = 'Cukup';
                } else {
                    $status = 'Perlu Ditingkatkan';
                }

                $analysis[] = [
                    'topic' => $topic,
                    'total_questions' => $total,
                    'correct_answers' => $correct,
                    'percentage' => $percentage,
                    'status' => $status,
                ];
            }
        }

        $pastAttempts = TestAttempt::where('user_id', $id)
            ->whereNotNull('completed_at')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->reverse()
            ->values();

        return view('teacher.students.analysis', [
            'student' => $student,
            'attempt' => $latestAttempt,
            'skillGaps' => $analysis,
            'pastAttempts' => $pastAttempts,
            'hasTest' => true,
        ]);
    }
}
