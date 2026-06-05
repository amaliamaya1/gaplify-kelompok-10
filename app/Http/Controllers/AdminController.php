<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Material;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $tab = $request->query('tab', 'pengguna');

        $stats = [
            'students'  => User::where('role', 'student')->count(),
            'teachers'  => User::where('role', 'teacher')->count(),
            'questions' => Question::count(),
            'materials' => Material::count(),
            'topics'    => Topic::count(),
        ];

        $users     = null;
        $questions = null;
        $materials = null;
        $topics    = Topic::orderBy('title')->get();

        if ($tab === 'pengguna') {
            $users = User::orderBy('role')->orderBy('name')->paginate(10)->withQueryString();
        } elseif ($tab === 'soal') {
            $questions = Question::with('topic')->paginate(10)->withQueryString();
        } elseif ($tab === 'materi') {
            $materials = Material::with('topic')->paginate(10)->withQueryString();
        }

        return view('admin.dashboard', compact('stats', 'tab', 'users', 'questions', 'materials', 'topics'));
    }
}
