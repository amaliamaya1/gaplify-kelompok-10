<?php

namespace App\Http\Controllers;

use App\Models\TestAttempt;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalysisController extends Controller
{
    public function index()
    {
        $latestAttempt = TestAttempt::where('user_id', Auth::id())
            ->whereNotNull('completed_at')
            ->orderBy('created_at', 'desc')
            ->first();

        if ($latestAttempt) {
            return redirect()->route('student.analysis.result', $latestAttempt->id);
        }

        return view('student.analysis.result', [
            'hasTest' => false
        ]);
    }

    public function result($attempt_id)
    {
        $attempt = TestAttempt::with('testAnswers.question.topic')
            ->where('id', $attempt_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Calculate gap per topic
        $analysis = [];
        $topics = Topic::where('is_comprehensive', false)->get();
        
        // Group answers by topic
        $topicAnswers = [];
        foreach ($attempt->testAnswers as $answer) {
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

        $pastAttempts = TestAttempt::where('user_id', Auth::id())
            ->whereNotNull('completed_at')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->reverse()
            ->values();

        return view('student.analysis.result', [
            'attempt' => $attempt,
            'skillGaps' => $analysis,
            'pastAttempts' => $pastAttempts,
            'hasTest' => true
        ]);
    }
}
