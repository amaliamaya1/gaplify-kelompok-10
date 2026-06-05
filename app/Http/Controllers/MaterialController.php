<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Topic;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('topic')->get();
        return view('admin.materials.index', compact('materials'));
    }

    public function create()
    {
        $topics = Topic::orderBy('title')->get();
        return view('admin.materials.create', compact('topics'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic_id'    => ['required', 'exists:topics,id'],
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content'     => ['required', 'string'],
            'video_url'   => ['nullable', 'url'],
        ]);

        Material::create($request->only('topic_id', 'title', 'description', 'content', 'video_url'));

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function edit(Material $material)
    {
        $topics = Topic::orderBy('title')->get();
        return view('admin.materials.edit', compact('material', 'topics'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'topic_id'    => ['required', 'exists:topics,id'],
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content'     => ['required', 'string'],
            'video_url'   => ['nullable', 'url'],
        ]);

        $material->update($request->only('topic_id', 'title', 'description', 'content', 'video_url'));

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil dihapus.');
    }
}
