<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestAttempt;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Get past tests for progress
        $pastAttempts = TestAttempt::with('topic')
            ->where('user_id', $userId)
            ->whereNotNull('completed_at')
            ->orderBy('completed_at', 'desc')
            ->limit(5)
            ->get();

        $hasTest = $pastAttempts->isNotEmpty();
        $latestAttempt = $pastAttempts->first();

        // Calculate some basic stats if they have taken tests
        $averageScore = $hasTest ? $pastAttempts->avg('score') : 0;
        $totalTests = $pastAttempts->count();

        $dikuasai = 0;
        $perluDitingkatkan = 0;

        if ($hasTest) {
            $latestAttemptWithAnswers = TestAttempt::with('testAnswers.question.topic')->find($latestAttempt->id);
            $topicScores = [];

            foreach ($latestAttemptWithAnswers->testAnswers as $answer) {
                if (!$answer->question || !$answer->question->topic) continue;
                
                $topicName = $answer->question->topic->title;
                if (!isset($topicScores[$topicName])) {
                    $topicScores[$topicName] = ['total' => 0, 'correct' => 0];
                }
                $topicScores[$topicName]['total']++;
                if ($answer->is_correct) {
                    $topicScores[$topicName]['correct']++;
                }
            }

            foreach ($topicScores as $topicName => $stats) {
                $pct = round(($stats['correct'] / $stats['total']) * 100);
                if ($pct >= 70) {
                    $dikuasai++;
                } else if ($pct < 50) {
                    $perluDitingkatkan++;
                }
            }
        }

        return view('dashboard', compact('hasTest', 'pastAttempts', 'latestAttempt', 'averageScore', 'totalTests', 'dikuasai', 'perluDitingkatkan'));
    }
}
