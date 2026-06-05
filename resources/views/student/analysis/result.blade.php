<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center w-full">
            <span class="font-bold text-[#0F172A] text-[16px]">{{ __('Hasil Analisis Kemampuan') }}</span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

@if(!isset($hasTest) || !$hasTest)
    {{-- Empty State --}}
    <div class="bg-white rounded-[1.5rem] p-12 shadow-sm border border-[#E2E8F0] text-center mt-2 max-w-3xl mx-auto">
        <div class="w-24 h-24 mx-auto bg-[#EFF6FF] rounded-full flex items-center justify-center mb-5">
            <svg class="w-12 h-12 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        </div>
        <h3 class="text-xl font-bold text-[#0F172A] mb-2">Belum Ada Hasil Analisis</h3>
        <p class="text-[#64748B] max-w-md mx-auto mb-8">Anda belum mengerjakan tes diagnostik. Kerjakan tes diagnostik untuk mengetahui dan menganalisis kemampuan TKJ Anda.</p>
        <a href="{{ route('student.test.index') }}" class="inline-flex items-center px-6 py-3 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold rounded-xl gap-2 transition-colors shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Mulai Tes Diagnostik
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

    {{-- Page Title --}}
    <div>
        <h2 class="text-2xl font-bold text-[#0F172A]">Hasil Analisis Kemampuan TKJ</h2>
        <p class="text-[#64748B] text-sm mt-1">Tes Diagnostik | {{ $attempt->completed_at ? $attempt->completed_at->format('d M Y') : 'Hari ini' }} | {{ Auth::user()->name }}</p>
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
                <p class="text-[#64748B] text-xs mt-3">Kamu menjawab <strong class="text-[#0F172A]">{{ $correctCount }} dari {{ $totalCount }}</strong> soal dengan benar</p>
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
                <!-- Y-axis labels -->
                <div class="flex flex-col justify-between text-[10px] text-[#94A3B8] pr-3 text-right h-40 shrink-0">
                    <span>100%</span>
                    <span>80%</span>
                    <span>60%</span>
                    <span>40%</span>
                    <span>20%</span>
                    <span>0%</span>
                </div>
                
                <!-- Chart Area -->
                <div class="relative flex-1 h-40 flex items-end gap-3 pb-0 border-b border-[#E2E8F0]">
                    <!-- Horizontal Grid Lines -->
                    <div class="absolute inset-0 flex flex-col justify-between z-0">
                        <div class="w-full border-t border-[#F1F5F9]"></div>
                        <div class="w-full border-t border-[#F1F5F9]"></div>
                        <div class="w-full border-t border-[#F1F5F9]"></div>
                        <div class="w-full border-t border-[#F1F5F9]"></div>
                        <div class="w-full border-t border-[#F1F5F9]"></div>
                        <div class="w-full"></div> <!-- Baseline -->
                    </div>

                    <!-- Bars -->
                    @foreach($skillGaps as $b)
                    @php
                        if($b['percentage'] >= 70) $barColor = 'bg-[#22C55E]';
                        elseif($b['percentage'] >= 50) $barColor = 'bg-[#F59E0B]';
                        else $barColor = 'bg-[#EF4444]';
                    @endphp
                    <div class="flex-1 flex flex-col items-center gap-1 z-10 h-full justify-end group relative">
                        <span class="text-[9px] font-bold text-[#475569] opacity-0 group-hover:opacity-100 transition-opacity absolute -mt-4">{{ $b['percentage'] }}%</span>
                        <div class="w-full max-w-[40px] {{ $barColor }} rounded-t-md transition-all relative" style="height: {{ max(2, $b['percentage']) }}%"></div>
                        <!-- X-axis Label -->
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
                Skill Gap Ditemukan
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
                        <p class="text-xs text-[#64748B]">Skor : {{ $s['percentage'] }}%</p>
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
                    Insight Untuk Kamu
                </h3>
                <div class="space-y-2">
                    @if($dikuasai > 0)
                    <div class="bg-[#EFF6FF] border-l-4 border-[#2563EB] p-3 rounded-r-lg text-xs text-[#1D4ED8] font-medium">
                        Bagus! Kamu sudah menguasai {{ $dikuasai }} topik dengan baik. Pertahankan!
                    </div>
                    @endif
                    @if($kurang > 0)
                    <div class="bg-[#FEF2F2] border-l-4 border-[#EF4444] p-3 rounded-r-lg text-xs text-[#B91C1C]">
                        <strong>Prioritas:</strong> Ada {{ $kurang }} topik yang perlu perhatian segera — pelajari ulang materi tersebut.
                    </div>
                    @endif
                    @if($cukup > 0)
                    <div class="bg-[#FFFBEB] border-l-4 border-[#F59E0B] p-3 rounded-r-lg text-xs text-[#92400E]">
                        Tingkatkan pemahamanmu di {{ $cukup }} topik lainnya untuk mencapai nilai maksimal.
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
                        <span class="text-xs {{ $pa->id == $attempt->id ? 'font-semibold text-[#2563EB]' : 'text-[#475569]' }}">Tes #{{ $index + 1 }} — {{ $pa->completed_at ? $pa->completed_at->format('d M Y') : 'Hari ini' }} {{ $pa->id == $attempt->id ? '(Ini)' : '' }}</span>
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
                    <p class="text-[11px] text-[#16A34A] font-medium">Kamu sudah berkembang <strong class="text-[#15803D]">+{{ $pointDiff }} poin</strong> sejak tes pertama!</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Bottom Actions --}}
    <div class="flex flex-col sm:flex-row justify-center gap-4 mt-10 pb-10">
        <a href="{{ route('student.recommendations.index') }}" class="flex-1 sm:flex-none px-6 py-3 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold rounded-xl flex items-center justify-center gap-2 transition-colors shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            Lihat Rekomendasi Materi
        </a>
        <a href="{{ route('student.test.index') }}" class="px-6 py-3 border border-[#E2E8F0] text-[#475569] hover:bg-[#F8FAFC] font-semibold rounded-xl flex items-center justify-center gap-2 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            Ulangi Tes
        </a>
        <a href="{{ route('student.dashboard') }}" class="px-6 py-3 border border-[#E2E8F0] text-[#475569] hover:bg-[#F8FAFC] font-semibold rounded-xl flex items-center justify-center gap-2 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Dashboard
        </a>
    </div>
</div>
@endif</div>
        </div>
    </div>
</x-app-layout>
