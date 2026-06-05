<?php

namespace App\Http\Controllers;

use App\Models\TestAttempt;
use App\Models\Topic;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $attempts = TestAttempt::with('testAnswers.question.topic')
            ->where('user_id', $user->id)
            ->whereNotNull('completed_at')
            ->orderBy('completed_at', 'desc')
            ->get();
            
        $latestAttempt = $attempts->first();
        
        $dikuasai = 0;
        $perluDitingkatkan = 0;
        $topicProgress = [];
        $recommendedMaterials = collect();

        if ($latestAttempt) {
            // Get all topics
            $allTopics = Topic::where('is_comprehensive', false)->get();
            
            // Calculate scores for latest attempt
            $topicScores = [];
            foreach ($latestAttempt->testAnswers as $answer) {
                if (!$answer->question || !$answer->question->topic) continue;
                
                $topicId = $answer->question->topic_id;
                if (!isset($topicScores[$topicId])) {
                    $topicScores[$topicId] = ['total' => 0, 'correct' => 0];
                }
                $topicScores[$topicId]['total']++;
                if ($answer->is_correct) {
                    $topicScores[$topicId]['correct']++;
                }
            }

            foreach ($allTopics as $topic) {
                $pct = 0;
                if (isset($topicScores[$topic->id]) && $topicScores[$topic->id]['total'] > 0) {
                    $pct = round(($topicScores[$topic->id]['correct'] / $topicScores[$topic->id]['total']) * 100);
                }
                
                $topicProgress[] = [
                    'topic' => $topic,
                    'percentage' => $pct
                ];

                if ($pct >= 70) {
                    $dikuasai++;
                } else {
                    $perluDitingkatkan++;
                    // Get recommended materials for topics that need improvement
                    $materials = Material::where('topic_id', $topic->id)->get();
                    $recommendedMaterials = $recommendedMaterials->merge($materials);
                }
            }
            
            // Sort topic progress by percentage descending
            usort($topicProgress, function($a, $b) {
                return $b['percentage'] <=> $a['percentage'];
            });
            
            // Limit recommendations
            $recommendedMaterials = $recommendedMaterials->take(3);
        }

        return view('student.dashboard', compact(
            'user', 
            'attempts', 
            'latestAttempt', 
            'dikuasai', 
            'perluDitingkatkan', 
            'topicProgress', 
            'recommendedMaterials'
        ));
    }
}
