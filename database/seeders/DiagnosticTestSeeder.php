<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Option;

class DiagnosticTestSeeder extends Seeder
{
    public function run(): void
    {
        $topicsData = [
            [
                'title' => 'Semua Topik',
                'description' => 'Tes komprehensif dari semua topik TKJ',
                'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
                'bg_color' => '',
                'icon_color' => 'text-white',
                'btn_color' => 'bg-[#2563EB] hover:bg-[#1D4ED8]',
                'level' => null,
                'badge' => 'Direkomendasikan',
                'label' => null,
                'question_count' => 25,
                'time_limit_minutes' => 15,
                'is_dark' => true,
                'is_comprehensive' => true,
            ],
            [
                'title' => 'Jaringan Komputer',
                'description' => 'Topologi, perangkat, dan media transmisi jaringan',
                'icon' => 'M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0',
                'bg_color' => 'bg-[#EFF6FF]',
                'icon_color' => 'text-[#2563EB]',
                'btn_color' => 'bg-[#2563EB] hover:bg-[#1D4ED8]',
                'level' => 'Dasar',
                'badge' => null,
                'label' => null,
                'question_count' => 5,
                'time_limit_minutes' => 8,
                'is_dark' => false,
                'is_comprehensive' => false,
            ],
            [
                'title' => 'IP Addressing',
                'description' => 'Kelas IP, alamat khusus, dan konsep pengalamatan',
                'icon' => 'M7 20l4-16m2 16l4-16M6 9h14M4 15h14',
                'bg_color' => 'bg-[#ECFEFF]',
                'icon_color' => 'text-[#06B6D4]',
                'btn_color' => 'bg-[#06B6D4] hover:bg-[#0891B2]',
                'level' => 'Dasar',
                'badge' => null,
                'label' => '#',
                'question_count' => 5,
                'time_limit_minutes' => 8,
                'is_dark' => false,
                'is_comprehensive' => false,
            ],
            [
                'title' => 'Subnetting',
                'description' => 'Perhitungan subnet, host, network & broadcast address',
                'icon' => 'M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z',
                'bg_color' => 'bg-[#FEF3C7]',
                'icon_color' => 'text-[#F59E0B]',
                'btn_color' => 'bg-[#F59E0B] hover:bg-[#D97706]',
                'level' => 'Menengah',
                'badge' => null,
                'label' => null,
                'question_count' => 5,
                'time_limit_minutes' => 10,
                'is_dark' => false,
                'is_comprehensive' => false,
            ],
            [
                'title' => 'Konfigurasi Perangkat',
                'description' => 'CLI Cisco, routing, interface, dan show commands',
                'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
                'bg_color' => 'bg-[#DCFCE7]',
                'icon_color' => 'text-[#22C55E]',
                'btn_color' => 'bg-[#22C55E] hover:bg-[#16A34A]',
                'level' => 'Menengah',
                'badge' => null,
                'label' => null,
                'question_count' => 5,
                'time_limit_minutes' => 8,
                'is_dark' => false,
                'is_comprehensive' => false,
            ],
            [
                'title' => 'Troubleshooting Jaringan',
                'description' => 'Ping, tracert, netstat, ARP, dan diagnostik koneksi',
                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                'bg_color' => 'bg-[#FEE2E2]',
                'icon_color' => 'text-[#EF4444]',
                'btn_color' => 'bg-[#EF4444] hover:bg-[#DC2626]',
                'level' => 'Menengah',
                'badge' => null,
                'label' => null,
                'question_count' => 5,
                'time_limit_minutes' => 8,
                'is_dark' => false,
                'is_comprehensive' => false,
            ],
            [
                'title' => 'Keamanan Jaringan',
                'description' => 'DDoS, phishing, firewall, enkripsi, VLAN segmentasi',
                'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'bg_color' => 'bg-[#F1F5F9]',
                'icon_color' => 'text-[#475569]',
                'btn_color' => 'bg-[#1E293B] hover:bg-[#0F172A]',
                'level' => 'Lanjutan',
                'badge' => null,
                'label' => null,
                'question_count' => 5,
                'time_limit_minutes' => 8,
                'is_dark' => false,
                'is_comprehensive' => false,
            ]
        ];

        foreach ($topicsData as $data) {
            $topic = Topic::create($data);

            if (!$topic->is_comprehensive) {
                // Generate 5 dummy questions for this specific topic
                for ($i = 1; $i <= 5; $i++) {
                    $options = ['A', 'B', 'C', 'D'];
                    $correctIndex = rand(0, 3);
                    
                    Question::create([
                        'topic_id' => $topic->id,
                        'question' => "Soal dummy {$i} untuk materi " . $topic->title . ". Manakah pernyataan berikut yang paling tepat?",
                        'option_a' => "Pilihan A untuk soal {$i} materi " . $topic->title,
                        'option_b' => "Pilihan B untuk soal {$i} materi " . $topic->title,
                        'option_c' => "Pilihan C untuk soal {$i} materi " . $topic->title,
                        'option_d' => "Pilihan D untuk soal {$i} materi " . $topic->title,
                        'correct_answer' => $options[$correctIndex]
                    ]);
                }
            }
        }
    }
}
