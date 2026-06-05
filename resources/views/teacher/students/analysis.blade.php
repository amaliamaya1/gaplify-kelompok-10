<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('teacher.students.detail', $student->id) }}" class="text-[#64748B] hover:text-[#0F172A] transition-colors p-2 bg-white rounded-xl border border-[#E2E8F0] shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <span class="font-bold text-[#0F172A] text-[16px]">Analisis Kemampuan Siswa</span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

@if(!$hasTest)
    {{-- Empty State --}}
    <div class="bg-white rounded-[1.5rem] p-12 shadow-sm border border-[#E2E8F0] text-center mt-2 max-w-3xl mx-auto">
        <div class="w-24 h-24 mx-auto bg-[#EFF6FF] rounded-full flex items-center justify-center mb-5">
            <svg class="w-12 h-12 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        </div>
        <h3 class="text-xl font-bold text-[#0F172A] mb-2">Belum Ada Hasil Analisis</h3>
        <p class="text-[#64748B] max-w-md mx-auto mb-8">
            <strong>{{ $student->name }}</strong> belum mengerjakan tes diagnostik. Data analisis akan tersedia setelah siswa menyelesaikan tes.
        </p>
        <a href="{{ route('teacher.students.detail', $student->id) }}" class="inline-flex items-center px-6 py-3 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold rounded-xl gap-2 transition-colors shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Detail Siswa
        </a>
    </div>
@else
@php
    $correctCount = $attempt->testAnswers->where('is_correct', true)->count();
    $totalCount = $attempt->testAnswers->count();

    $dikuasai = collect($skillGaps)->where('status', 'Dikuasai')->count();
    $cukup = collect($skillGaps)->where('status', 'Cukup')->count();
    $kurang = collect($skillGaps)->where('status', 'Perlu Ditingkatkan')->count();

    if ($attempt->score >= 70) {
        $overallStatus = 'Baik';
        $overallClass = 'bg-[#DCFCE7] text-[#16A34A]';
        $scoreColor = '#22C55E';
        $scoreBgColor = '#DCFCE7';
        $scoreShadow = 'rgba(34,197,94,0.2)';
        $scoreTextColor = 'text-[#22C55E]';
    } elseif ($attempt->score >= 50) {
        $overallStatus = 'Cukup';
        $overallClass = 'bg-[#FEF3C7] text-[#D97706]';
        $scoreColor = '#F59E0B';
        $scoreBgColor = '#FEF3C7';
        $scoreShadow = 'rgba(245,158,11,0.2)';
        $scoreTextColor = 'text-[#F59E0B]';
    } else {
        $overallStatus = 'Perlu Ditingkatkan';
        $overallClass = 'bg-[#FEE2E2] text-[#EF4444]';
        $scoreColor = '#EF4444';
        $scoreBgColor = '#FEE2E2';
        $scoreShadow = 'rgba(239,68,68,0.2)';
        $scoreTextColor = 'text-[#EF4444]';
    }
@endphp
<div class="space-y-6">

    {{-- Student Info Banner --}}
    <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center gap-4 relative overflow-hidden">
        <div class="absolute right-0 top-0 w-48 h-48 bg-gradient-to-br from-[#EFF6FF] to-transparent opacity-50 -translate-y-1/2 translate-x-1/2 rounded-full pointer-events-none"></div>
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] text-[#2563EB] flex items-center justify-center text-lg font-black shrink-0 border border-[#BFDBFE]">
            {{ strtoupper(substr($student->name, 0, 1)) }}
        </div>
        <div class="flex-1">
            <p class="text-xs font-semibold text-[#64748B] uppercase tracking-wider">Analisis untuk</p>
            <h2 class="text-lg font-bold text-[#0F172A]">{{ $student->name }}</h2>
            <p class="text-xs text-[#94A3B8]">{{ $student->email }}</p>
        </div>
        <div class="text-right shrink-0">
            <p class="text-xs text-[#64748B]">Tes terakhir</p>
            <p class="text-sm font-semibold text-[#0F172A]">{{ $attempt->completed_at ? $attempt->completed_at->format('d M Y') : '-' }}</p>
        </div>
    </div>

    {{-- Page Title --}}
    <div>
        <h2 class="text-2xl font-bold text-[#0F172A]">Hasil Analisis Kemampuan TKJ</h2>
        <p class="text-[#64748B] text-sm mt-1">Tes Diagnostik | {{ $attempt->completed_at ? $attempt->completed_at->format('d M Y') : 'Hari ini' }} | {{ $student->name }}</p>
    </div>

    {{-- Row 1: Score Card + Bar Chart --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Score Card --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2E8F0]">
            <div class="flex flex-col items-center mb-6">
                {{-- Circular Score --}}
                <div class="relative w-40 h-40 mb-4 rounded-full bg-white p-2" style="box-shadow: 0 10px 40px -10px {{ $scoreShadow }};">
                    <svg class="w-full h-full -rotate-90 drop-shadow-sm" viewBox="0 0 36 36">
                        <path stroke="{{ $scoreBgColor }}" stroke-width="3" fill="none" stroke-linecap="round" d="M18 2.0845a15.9155 15.9155 0 010 31.831a15.9155 15.9155 0 010-31.831"/>
                        <path stroke="{{ $scoreColor }}" stroke-dasharray="{{ $attempt->score }},100" stroke-width="3.5" stroke-linecap="round" fill="none" d="M18 2.0845a15.9155 15.9155 0 010 31.831a15.9155 15.9155 0 010-31.831"/>
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-4xl font-extrabold {{ $scoreTextColor }}">{{ $attempt->score }}</span>
                        <span class="text-[10px] text-[#64748B] font-medium mt-1">Skor Akhir</span>
                    </div>
                </div>
                <span class="{{ $overallClass }} text-xs font-bold px-3 py-1 rounded-full">{{ $overallStatus }}</span>
                <p class="text-[#64748B] text-xs mt-3">Menjawab <strong class="text-[#0F172A]">{{ $correctCount }} dari {{ $totalCount }}</strong> soal dengan benar</p>
            </div>
            <div class="grid grid-cols-3 divide-x divide-[#F1F5F9] text-center">
                <div class="px-4">
                    <p class="text-2xl font-extrabold text-[#22C55E]">{{ $dikuasai }}</p>
                    <p class="text-[11px] text-[#64748B] mt-1">Dikuasai</p>
                </div>
                <div class="px-4">
                    <p class="text-2xl font-extrabold text-[#F59E0B]">{{ $cukup }}</p>
                    <p class="text-[11px] text-[#64748B] mt-1">Cukup</p>
                </div>
                <div class="px-4">
                    <p class="text-2xl font-extrabold text-[#EF4444]">{{ $kurang }}</p>
                    <p class="text-[11px] text-[#64748B] mt-1">Perlu Belajar</p>
                </div>
            </div>
        </div>

        {{-- Bar Chart --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2E8F0]">
            <div class="flex items-center justify-between mb-5">
                <h3 class="font-bold text-[#0F172A] flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#2563EB]" fill="currentColor" viewBox="0 0 24 24"><path d="M3 12h4v9H3zm7-6h4v15h-4zm7-4h4v19h-4z"/></svg>
                    Skor Per Topik
                </h3>
                <div class="flex items-center gap-3 text-[10px] font-semibold">
                    <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-sm bg-[#22C55E] inline-block"></span> &ge;70% Dikuasai</span>
                    <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-sm bg-[#F59E0B] inline-block"></span> 50-69%</span>
                    <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-sm bg-[#EF4444] inline-block"></span> &lt;50%</span>
                </div>
            </div>
            
            <div class="relative h-60 mt-8 mb-6 flex">
                {{-- Y-axis labels --}}
                <div class="flex flex-col justify-between text-[10px] text-[#94A3B8] pr-3 text-right h-40 shrink-0">
                    <span>100%</span>
                    <span>80%</span>
                    <span>60%</span>
                    <span>40%</span>
                    <span>20%</span>
                    <span>0%</span>
                </div>
                
                {{-- Chart Area --}}
                <div class="relative flex-1 h-40 flex items-end gap-3 pb-0 border-b border-[#E2E8F0]">
                    {{-- Horizontal Grid Lines --}}
                    <div class="absolute inset-0 flex flex-col justify-between z-0">
                        <div class="w-full border-t border-[#F1F5F9]"></div>
                        <div class="w-full border-t border-[#F1F5F9]"></div>
                        <div class="w-full border-t border-[#F1F5F9]"></div>
                        <div class="w-full border-t border-[#F1F5F9]"></div>
                        <div class="w-full border-t border-[#F1F5F9]"></div>
                        <div class="w-full"></div>
                    </div>

                    {{-- Bars --}}
                    @foreach($skillGaps as $b)
                    @php
                        if($b['percentage'] >= 70) $barColor = 'bg-[#22C55E]';
                        elseif($b['percentage'] >= 50) $barColor = 'bg-[#F59E0B]';
                        else $barColor = 'bg-[#EF4444]';
                    @endphp
                    <div class="flex-1 flex flex-col items-center gap-1 z-10 h-full justify-end group relative">
                        <span class="text-[9px] font-bold text-[#475569] opacity-0 group-hover:opacity-100 transition-opacity absolute -mt-4">{{ $b['percentage'] }}%</span>
                        <div class="w-full max-w-[40px] {{ $barColor }} rounded-t-md transition-all relative" style="height: {{ max(2, $b['percentage']) }}%"></div>
                        {{-- X-axis Label --}}
                        <div class="absolute top-full mt-2 left-1/2 -translate-x-1/2">
                            <div class="relative w-0 h-0">
                                <span class="absolute top-0 right-0 text-[9px] text-[#64748B] whitespace-nowrap -rotate-45 origin-top-right">{{ Str::words($b['topic']->title, 2, '') }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Row 2: Skill Gap + Insight + Progress --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Skill Gap --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2E8F0]">
            <h3 class="font-bold text-[#0F172A] flex items-center gap-2 mb-5">
                <svg class="w-5 h-5 text-[#EF4444]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                Detail Skill Gap
            </h3>
            
            <div class="space-y-4 max-h-[300px] overflow-y-auto pr-2">
                @foreach($skillGaps as $s)
                @php
                    if($s['percentage'] >= 70) $sc = 'bg-[#DCFCE7] text-[#16A34A]';
                    elseif($s['percentage'] >= 50) $sc = 'bg-[#FEF3C7] text-[#D97706]';
                    else $sc = 'bg-[#FEE2E2] text-[#EF4444]';
                @endphp
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold text-[#0F172A] text-sm">{{ $s['topic']->title }}</p>
                        <p class="text-xs text-[#64748B]">Benar: {{ $s['correct_answers'] }}/{{ $s['total_questions'] }} ({{ $s['percentage'] }}%)</p>
                    </div>
                    <span class="text-[10px] font-bold px-3 py-1 rounded-md whitespace-nowrap {{ $sc }}">{{ $s['status'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Insight + Progress --}}
        <div class="space-y-5">
            {{-- Insight --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2E8F0]">
                <h3 class="font-bold text-[#0F172A] flex items-center gap-2 mb-4">
                    <svg class="w-5 h-5 text-[#F59E0B]" fill="currentColor" viewBox="0 0 24 24"><path d="M9 21c0 .55.45 1 1 1h4c.55 0 1-.45 1-1v-1H9v1zm3-19C8.14 2 5 5.14 5 9c0 2.38 1.19 4.47 3 5.74V17c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-2.26c1.81-1.27 3-3.36 3-5.74 0-3.86-3.14-7-7-7z"/></svg>
                    Insight untuk Guru
                </h3>
                <div class="space-y-2">
                    @if($dikuasai > 0)
                    <div class="bg-[#EFF6FF] border-l-4 border-[#2563EB] p-3 rounded-r-lg text-xs text-[#1D4ED8] font-medium">
                        {{ $student->name }} sudah menguasai {{ $dikuasai }} topik dengan baik.
                    </div>
                    @endif
                    @if($kurang > 0)
                    <div class="bg-[#FEF2F2] border-l-4 border-[#EF4444] p-3 rounded-r-lg text-xs text-[#B91C1C]">
                        <strong>Perlu perhatian:</strong> Ada {{ $kurang }} topik yang perlu pendampingan segera.
                    </div>
                    @endif
                    @if($cukup > 0)
                    <div class="bg-[#FFFBEB] border-l-4 border-[#F59E0B] p-3 rounded-r-lg text-xs text-[#92400E]">
                        {{ $cukup }} topik masih dalam kategori cukup dan bisa ditingkatkan dengan latihan tambahan.
                    </div>
                    @endif
                </div>
            </div>

            {{-- Perkembangan Skor --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2E8F0]">
                <h3 class="font-bold text-[#0F172A] flex items-center gap-2 mb-4">
                    <svg class="w-5 h-5 text-[#22C55E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    Perkembangan Skor
                </h3>
                <div class="space-y-2 max-h-[150px] overflow-y-auto">
                    @foreach($pastAttempts as $index => $pa)
                    <div class="flex items-center justify-between p-3 {{ $pa->id == $attempt->id ? 'bg-[#EFF6FF] border border-[#BFDBFE]' : 'bg-[#F8FAFC]' }} rounded-xl">
                        <span class="text-xs {{ $pa->id == $attempt->id ? 'font-semibold text-[#2563EB]' : 'text-[#475569]' }}">Tes #{{ $index + 1 }} — {{ $pa->completed_at ? $pa->completed_at->format('d M Y') : 'Hari ini' }} {{ $pa->id == $attempt->id ? '(Terbaru)' : '' }}</span>
                        <span class="font-bold {{ $pa->id == $attempt->id ? 'text-[#2563EB]' : 'text-[#F59E0B]' }}">{{ $pa->score }}</span>
                    </div>
                    @endforeach
                </div>
                
                @php
                    $firstAttempt = $pastAttempts->first();
                    $pointDiff = $attempt->score - ($firstAttempt ? $firstAttempt->score : $attempt->score);
                @endphp
                @if($pointDiff > 0)
                <div class="mt-5 border-l-2 border-[#22C55E] pl-3 py-1">
                    <p class="text-[11px] text-[#16A34A] font-medium">Siswa berkembang <strong class="text-[#15803D]">+{{ $pointDiff }} poin</strong> sejak tes pertama!</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Bottom Actions --}}
    <div class="flex flex-col sm:flex-row justify-start gap-4 mt-6 pb-10">
        <a href="{{ route('teacher.students.detail', $student->id) }}" class="px-6 py-3 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold rounded-xl flex items-center justify-center gap-2 transition-colors shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Detail Siswa
        </a>
        <a href="{{ route('teacher.students') }}" class="px-6 py-3 border border-[#E2E8F0] text-[#475569] hover:bg-[#F8FAFC] font-semibold rounded-xl flex items-center justify-center gap-2 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            Daftar Siswa
        </a>
    </div>
</div>
@endif
        </div>
    </div>
</x-app-layout>
