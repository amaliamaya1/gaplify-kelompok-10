<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\TestAttempt;
use App\Models\TestAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosticTestController extends Controller
{
    public function index()
    {
        $topics = \App\Models\Topic::withCount('questions')->get();
        return view('student.diagnostic.index', compact('topics'));
    }

    public function start(Request $request)
    {
        $topicId = $request->query('topic_id');
        
        $query = Question::with('topic')->inRandomOrder();
        
        if ($topicId) {
            $query->where('topic_id', $topicId);
            $questions = $query->limit(5)->get();
        } else {
            $questions = $query->limit(25)->get();
        }
        
        // Prevent empty test
        if($questions->isEmpty()){
            return back()->with('error', 'Belum ada soal ujian tersedia.');
        }

        $attempt = TestAttempt::create([
            'user_id' => Auth::id(),
            'score' => null, // not finished yet
        ]);

        return view('student.diagnostic.start', compact('questions', 'attempt'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'attempt_id' => 'required|exists:test_attempts,id',
            'answers' => 'required|array'
        ]);

        $attempt = TestAttempt::where('id', $request->attempt_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $answers = $request->input('answers');
        
        $totalCorrect = 0;
        $totalQuestions = count($answers);

        foreach ($answers as $question_id => $selected_answer) {
            $question = Question::find($question_id);
            if (!$question) continue;

            $is_correct = ($question->correct_answer === $selected_answer);
            if ($is_correct) {
                $totalCorrect++;
            }

            TestAnswer::create([
                'attempt_id' => $attempt->id,
                'question_id' => $question->id,
                'selected_answer' => $selected_answer,
                'is_correct' => $is_correct
            ]);
        }

        $overallScore = $totalQuestions > 0 ? round(($totalCorrect / $totalQuestions) * 100) : 0;
        
        $attempt->update([
            'score' => $overallScore,
            'completed_at' => now(),
        ]);

        return redirect()->route('student.analysis.result', $attempt->id)->with('success', 'Ujian selesai!');
    }
}
