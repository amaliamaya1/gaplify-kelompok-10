<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::withCount('questions', 'materials')->get();
        return view('admin.topics.index', compact('topics'));
    }

    public function create()
    {
        return view('admin.topics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Topic::create($request->only('title', 'description'));

        return redirect()->route('admin.topics.index')->with('success', 'Topik berhasil ditambahkan.');
    }

    public function edit(Topic $topic)
    {
        return view('admin.topics.edit', compact('topic'));
    }

    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $topic->update($request->only('title', 'description'));

        return redirect()->route('admin.topics.index')->with('success', 'Topik berhasil diperbarui.');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect()->route('admin.topics.index')->with('success', 'Topik berhasil dihapus.');
    }
}
