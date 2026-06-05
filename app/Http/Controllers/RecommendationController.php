<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\TestAttempt;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function index()
    {
        // Get the latest attempt
        $attempt = TestAttempt::with('testAnswers.question.topic')
            ->where('user_id', Auth::id())
            ->whereNotNull('completed_at')
            ->orderBy('created_at', 'desc')
            ->first();

        $recommendations = collect();
        $skillGapTopics = collect();  // topics with score < 70 (priority)

        if ($attempt) {
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

            foreach ($topicAnswers as $topicId => $data) {
                $percentage = $data['total'] > 0 ? round(($data['correct'] / $data['total']) * 100) : 0;
                
                if ($percentage < 70) {
                    $topic = Topic::find($topicId);
                    if ($topic) $skillGapTopics->push($topic);
                }
            }
        }

        // Get ALL materials with their topics for display
        $allMaterials = Material::with('topic')->get();

        // Attach priority flag
        $allMaterials = $allMaterials->map(function($material) use ($skillGapTopics) {
            $material->is_priority = $skillGapTopics->contains('id', $material->topic_id);
            return $material;
        });

        return view('student.recommendations.index', [
            'allMaterials'   => $allMaterials,
            'skillGapTopics' => $skillGapTopics,
            'attempt'        => $attempt,
        ]);
    }

    public function show(Material $material)
    {
        return view('student.recommendations.show', compact('material'));
    }
}
