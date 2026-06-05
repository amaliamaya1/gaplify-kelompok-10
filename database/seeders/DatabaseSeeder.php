<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Users
        User::create([
            'name' => 'Admin Gaplify',
            'email' => 'admin@gaplify.com',
            'password' => Hash::make('AdminGaplify01'),
            'role' => 'admin'
        ]);
        
        User::create([
            'name' => 'Guru TKJ',
            'email' => 'teacher@gaplify.com',
            'password' => Hash::make('guruTKJ01'),
            'role' => 'teacher'
        ]);
        
        User::create([
            'name' => 'Siswa TKJ',
            'email' => 'student@gaplify.com',
            'password' => Hash::make('SiswaTKJ01'),
            'role' => 'student'
        ]);



        // 5. Seed Complete Topics, Questions, and Materials (from seeders)
        $this->call(DiagnosticTestSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AdditionalQuestionsSeeder::class);
        $this->call(MaterialSeeder::class);
    }
}
