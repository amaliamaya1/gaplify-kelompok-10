<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Topic;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('topic')->get();
        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        $topics = Topic::orderBy('title')->get();
        return view('admin.questions.create', compact('topics'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic_id'       => ['required', 'exists:topics,id'],
            'question'       => ['required', 'string'],
            'option_a'       => ['required', 'string'],
            'option_b'       => ['required', 'string'],
            'option_c'       => ['required', 'string'],
            'option_d'       => ['required', 'string'],
            'correct_answer' => ['required', 'in:A,B,C,D'],
        ]);

        Question::create($request->only(
            'topic_id', 'question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_answer'
        ));

        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil ditambahkan.');
    }

    public function edit(Question $question)
    {
        $topics = Topic::orderBy('title')->get();
        return view('admin.questions.edit', compact('question', 'topics'));
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'topic_id'       => ['required', 'exists:topics,id'],
            'question'       => ['required', 'string'],
            'option_a'       => ['required', 'string'],
            'option_b'       => ['required', 'string'],
            'option_c'       => ['required', 'string'],
            'option_d'       => ['required', 'string'],
            'correct_answer' => ['required', 'in:A,B,C,D'],
        ]);

        $question->update($request->only(
            'topic_id', 'question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_answer'
        ));

        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil diperbarui.');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil dihapus.');
    }
}
