<x-app-layout>
    <x-slot name="header">Pilih Topik Test</x-slot>
    <div class="dashboard-content">
    <h2 class="text-[26px] font-bold text-[#0F172A] mb-1">Pilih Topik Tes Diagnostik</h2>
    <p class="text-[#64748B] text-sm mb-6">Kamu dapat mengerjakan tes untuk topik tertentu, atau pilih Semua Topik untuk tes komprehensif.</p>

    <div class="bg-[#EFF6FF] border border-[#BFDBFE] rounded-xl p-4 mb-8 flex items-start space-x-3">
        <div class="w-9 h-9 bg-[#2563EB] rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <div>
            <p class="font-bold text-[#2563EB] text-sm mb-0.5">Cara Kerja Tes Diagnostik</p>
            <p class="text-[#3B82F6] text-xs">Setiap topik berisi 5 soal pilihan ganda. Jawab semua soal, lalu submit untuk melihat hasil analisis kemampuanmu secara otomatis.</p>
        </div>
    </div>

    @php
    $cards = [
        [
            'is_dark' => true,
            'title' => 'Semua Topik',
            'description' => 'Tes komprehensif dari semua topik TKJ',
            'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
            'question_count' => 25,
            'time_limit_minutes' => 15,
            'badge' => 'Direkomendasikan',
            'btn_color' => 'bg-[#2563EB] hover:bg-blue-600',
            'topic_id' => null
        ],
        [
            'is_dark' => false,
            'title' => 'Jaringan Komputer',
            'description' => 'Topologi, perangkat, dan media transmisi jaringan',
            'icon' => 'M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.14 0M4.222 4.222c8.163-8.164 21.393-8.164 29.556 0',
            'bg_color' => 'bg-blue-50',
            'icon_color' => 'text-blue-500',
            'question_count' => 5,
            'time_limit_minutes' => 8,
            'level' => 'Dasar',
            'btn_color' => 'bg-[#2563EB] hover:bg-blue-600',
            'topic_id' => $topics->firstWhere('title', 'Jaringan Komputer')?->id ?? 1
        ],
        [
            'is_dark' => false,
            'title' => 'IP Addressing',
            'description' => 'Kelas IP, alamat khusus, dan konsep pengalamatan',
            'label' => '#',
            'bg_color' => 'bg-cyan-50',
            'icon_color' => 'text-cyan-500',
            'question_count' => 5,
            'time_limit_minutes' => 8,
            'level' => 'Dasar',
            'btn_color' => 'bg-[#06B6D4] hover:bg-cyan-600',
            'topic_id' => $topics->firstWhere('title', 'IP Addressing')?->id ?? 2
        ],
        [
            'is_dark' => false,
            'title' => 'Subnetting',
            'description' => 'Perhitungan subnet, host, network & broadcast address',
            'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4',
            'bg_color' => 'bg-orange-50',
            'icon_color' => 'text-orange-500',
            'question_count' => 5,
            'time_limit_minutes' => 10,
            'level' => 'Menengah',
            'btn_color' => 'bg-[#F59E0B] hover:bg-orange-600',
            'topic_id' => $topics->firstWhere('title', 'Subnetting')?->id ?? 3
        ],
        [
            'is_dark' => false,
            'title' => 'Konfigurasi Perangkat',
            'description' => 'CLI Cisco, routing, interface, dan show commands',
            'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065zM15 12a3 3 0 11-6 0 3 3 0 016 0z',
            'bg_color' => 'bg-green-50',
            'icon_color' => 'text-green-500',
            'question_count' => 5,
            'time_limit_minutes' => 8,
            'level' => 'Menengah',
            'btn_color' => 'bg-[#10B981] hover:bg-green-600',
            'topic_id' => $topics->firstWhere('title', 'Konfigurasi Perangkat')?->id ?? 4
        ],
        [
            'is_dark' => false,
            'title' => 'Troubleshooting Jaringan',
            'description' => 'Ping, tracert, netstat, ARP, dan diagnostik koneksi',
            'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
            'bg_color' => 'bg-red-50',
            'icon_color' => 'text-red-500',
            'question_count' => 5,
            'time_limit_minutes' => 8,
            'level' => 'Menengah',
            'btn_color' => 'bg-[#EF4444] hover:bg-red-600',
            'topic_id' => $topics->firstWhere('title', 'Troubleshooting Jaringan')?->id ?? 5
        ]
    ];

    $levelClass=['Dasar'=>'bg-[#DCFCE7] text-[#16A34A]','Menengah'=>'bg-[#FEF3C7] text-[#D97706]','Lanjutan'=>'bg-[#FEE2E2] text-[#EF4444]'];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @foreach($cards as $t)
        @if($t['is_dark'])
        <div class="bg-gradient-to-br from-[#0F172A] to-[#1E3A8A] rounded-2xl p-5 text-white shadow-md flex flex-col border border-[#1E293B]">
            <div class="flex items-start space-x-3 mb-4">
                <div class="w-11 h-11 bg-[#1E293B] rounded-xl flex items-center justify-center flex-shrink-0 border border-[#334155]">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $t['icon'] }}"/></svg>
                </div>
                <div><h3 class="font-bold text-[16px]">{{ $t['title'] }}</h3><p class="text-[#94A3B8] text-[11px] mt-0.5">{{ $t['description'] }}</p></div>
            </div>
            <div class="flex flex-wrap gap-x-3 gap-y-1 text-[11px] text-[#94A3B8] mb-4">
                <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>{{ $t['question_count'] }} soal</span>
                <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>+{{ $t['time_limit_minutes'] }} Menit</span>
                <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>Acak Topik</span>
            </div>
            <div class="mt-auto border-t border-[#334155] pt-3 flex items-center justify-between gap-2">
                <span class="bg-[#334155] text-white text-[10px] font-semibold px-2 py-1 rounded whitespace-nowrap">{{ $t['badge'] }}</span>
                <a href="{{ route('student.test.start') }}" class="{{ $t['btn_color'] }} text-white text-xs font-bold px-4 py-2 rounded-lg flex items-center gap-1 transition-colors">Mulai Tes <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></a>
            </div>
        </div>
        @else
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-[#E2E8F0] flex flex-col hover:shadow-md transition-shadow">
            <div class="flex items-start space-x-3 mb-4">
                <div class="w-11 h-11 {{ $t['bg_color'] }} rounded-xl flex items-center justify-center flex-shrink-0">
                    @if(isset($t['label']))
                    <span class="{{ $t['icon_color'] }} font-bold text-xl">{{ $t['label'] }}</span>
                    @else
                    <svg class="w-5 h-5 {{ $t['icon_color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $t['icon'] }}"/></svg>
                    @endif
                </div>
                <div><h3 class="font-bold text-[#0F172A] text-[14px] leading-tight">{{ $t['title'] }}</h3><p class="text-[#64748B] text-[11px] mt-0.5 line-clamp-2">{{ $t['description'] }}</p></div>
            </div>
            <div class="flex flex-wrap items-center justify-between gap-y-1 text-[11px] text-[#94A3B8] mb-4">
                <div class="flex items-center gap-2">
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>{{ $t['question_count'] }} soal</span>
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>+{{ $t['time_limit_minutes'] }} Menit</span>
                </div>
                <span class="text-[9px] font-bold px-2 py-0.5 rounded uppercase {{ $levelClass[$t['level']] ?? '' }}">{{ $t['level'] }}</span>
            </div>
            <div class="mt-auto">
                <a href="{{ route('student.test.start', ['topic_id' => $t['topic_id']]) }}" class="w-full {{ $t['btn_color'] }} text-white text-xs font-bold py-2.5 rounded-lg flex items-center justify-center gap-1.5 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Mulai Tes Topik Ini
                </a>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    <a href="{{ route('student.dashboard') }}" class="inline-flex items-center gap-2 border border-[#E2E8F0] text-[#64748B] hover:bg-[#F8FAFC] px-5 py-2.5 rounded-xl font-medium text-sm transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Dashboard
    </a>
</div>
</x-app-layout>
