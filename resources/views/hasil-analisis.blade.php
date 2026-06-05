@extends('layouts.dashboard')
@section('title','Hasil Analisis Kemampuan')
@section('header_title','Hasil Analisis Kemampuan')

@section('dashboard_content')
@if(!$hasTest)
{{-- ===================== EMPTY STATE ===================== --}}
<div class="flex flex-col items-center justify-center py-20 text-center">
    <div class="w-24 h-24 bg-[#EFF6FF] rounded-full flex items-center justify-center mb-6">
        <svg class="w-12 h-12 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
    </div>
    <h2 class="text-2xl font-bold text-[#0F172A] mb-3">Belum Ada Data Analisis</h2>
    <p class="text-[#64748B] text-sm max-w-md mb-8">Kamu belum mengerjakan tes diagnostik. Selesaikan tes terlebih dahulu untuk melihat hasil analisis kemampuanmu secara lengkap.</p>
    <div class="flex flex-col sm:flex-row gap-3">
        <a href="{{ route('student.test.index') }}" class="px-8 py-3 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold rounded-xl flex items-center gap-2 transition-colors shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Mulai Tes Diagnostik
        </a>
        <a href="{{ route('dashboard') }}" class="px-8 py-3 border border-[#E2E8F0] text-[#475569] hover:bg-[#F8FAFC] font-semibold rounded-xl transition-colors">
            Kembali ke Dashboard
        </a>
    </div>
</div>

@else
{{-- ===================== POPULATED STATE ===================== --}}
@php
    $correctCount = $attempt->testAnswers->where('is_correct', true)->count();
    $totalCount = $attempt->testAnswers->count();
    
    $dikuasai = collect($skillGaps)->where('status', 'Dikuasai')->count();
    $cukup = collect($skillGaps)->where('status', 'Cukup')->count();
    $kurang = collect($skillGaps)->where('status', 'Perlu Ditingkatkan')->count();

    if ($attempt->score >= 70) {
        $overallStatus = 'Baik';
        $overallClass = 'bg-[#DCFCE7] text-[#16A34A]';
    } elseif ($attempt->score >= 50) {
        $overallStatus = 'Cukup';
        $overallClass = 'bg-[#FEF3C7] text-[#D97706]';
    } else {
        $overallStatus = 'Perlu Ditingkatkan';
        $overallClass = 'bg-[#FEE2E2] text-[#EF4444]';
    }
@endphp
<div class="space-y-6">

    {{-- Page Title --}}
    <div>
        <h2 class="text-2xl font-bold text-[#0F172A]">Hasil Analisis Kemampuan TKJ</h2>
        <p class="text-[#64748B] text-sm mt-1">Tes: {{ $attempt->topic->title }} &nbsp;|&nbsp; {{ $attempt->completed_at->format('d M Y') }} &nbsp;|&nbsp; {{ Auth::user()->name }}</p>
    </div>

    {{-- Row 1: Score Card + Bar Chart --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Score Card --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2E8F0]">
            <div class="flex flex-col items-center mb-6">
                {{-- Circular Score --}}
                <div class="relative w-36 h-36 mb-4">
                    <svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
                        <path stroke="#F1F5F9" stroke-width="3" fill="none" d="M18 2.0845a15.9155 15.9155 0 010 31.831a15.9155 15.9155 0 010-31.831"/>
                        <path stroke="#2563EB" stroke-dasharray="{{ $attempt->score }},100" stroke-width="3" stroke-linecap="round" fill="none" d="M18 2.0845a15.9155 15.9155 0 010 31.831a15.9155 15.9155 0 010-31.831"/>
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-4xl font-extrabold text-[#2563EB]">{{ $attempt->score }}</span>
                        <span class="text-[11px] text-[#64748B] font-medium">Skor Akhir</span>
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
            
            <div class="flex items-end gap-2 h-40">
                @foreach($skillGaps as $b)
                @php
                    if($b['score'] >= 70) $barColor = 'bg-[#22C55E]';
                    elseif($b['score'] >= 50) $barColor = 'bg-[#F59E0B]';
                    else $barColor = 'bg-[#EF4444]';
                @endphp
                <div class="flex-1 flex flex-col items-center gap-1">
                    <span class="text-[9px] font-bold text-[#475569]">{{ $b['score'] }}%</span>
                    <div class="w-full {{ $barColor }} rounded-t-md transition-all" style="height: {{ max(5, $b['score'] * 1.4) }}px"></div>
                </div>
                @endforeach
            </div>
            <div class="flex gap-2 mt-2">
                @foreach($skillGaps as $b)
                <div class="flex-1 text-center">
                    <p class="text-[9px] text-[#64748B] leading-tight">{{ Str::words($b['name'],1,'') }}</p>
                </div>
                @endforeach
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
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold text-[#0F172A] text-sm">{{ $s['name'] }}</p>
                        <p class="text-xs text-[#64748B]">Skor : {{ $s['score'] }}%</p>
                    </div>
                    <span class="text-[10px] font-bold px-3 py-1 rounded-md whitespace-nowrap {{ $s['sc'] }}">{{ $s['status'] }}</span>
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
                        <span class="text-xs {{ $pa->id == $attempt->id ? 'font-semibold text-[#2563EB]' : 'text-[#475569]' }}">Tes #{{ $index + 1 }} — {{ $pa->completed_at->format('d M Y') }} {{ $pa->id == $attempt->id ? '(Ini)' : '' }}</span>
                        <span class="font-bold {{ $pa->id == $attempt->id ? 'text-[#2563EB]' : 'text-[#F59E0B]' }}">{{ $pa->score }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Actions --}}
    <div class="flex flex-col sm:flex-row gap-3 pt-2">
        <a href="{{ route('rekomendasi-materi') }}" class="flex-1 sm:flex-none px-6 py-3 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold rounded-xl flex items-center justify-center gap-2 transition-colors shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            Lihat Rekomendasi Materi
        </a>
        <a href="{{ route('student.test.index') }}" class="px-6 py-3 border border-[#E2E8F0] text-[#475569] hover:bg-[#F8FAFC] font-semibold rounded-xl flex items-center justify-center gap-2 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            Ulangi Tes
        </a>
        <a href="{{ route('dashboard') }}" class="px-6 py-3 border border-[#E2E8F0] text-[#475569] hover:bg-[#F8FAFC] font-semibold rounded-xl flex items-center justify-center gap-2 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Dashboard
        </a>
    </div>
</div>
@endif
@endsection
