@extends('layouts.dashboard')
@section('title','Tes Diagnostik')
@section('header_title','Pilih Topik Test')
@section('dashboard_content')
<div>
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

    $levelClass=['Dasar'=>'bg-[#DCFCE7] text-[#16A34A]','Menengah'=>'bg-[#FEF3C7] text-[#D97706]','Lanjutan'=>'bg-[#FEE2E2] text-[#EF4444]'];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 mb-8">
        @foreach($topics as $t)
        @if($t->is_dark)
        <div class="bg-gradient-to-br from-[#0F172A] to-[#1E3A8A] rounded-2xl p-5 text-white shadow-md flex flex-col border border-[#1E293B]">
            <div class="flex items-start space-x-3 mb-4">
                <div class="w-11 h-11 bg-[#1E293B] rounded-xl flex items-center justify-center flex-shrink-0 border border-[#334155]">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $t->icon }}"/></svg>
                </div>
                <div><h3 class="font-bold text-[16px]">{{ $t->title }}</h3><p class="text-[#94A3B8] text-[11px] mt-0.5">{{ $t->description }}</p></div>
            </div>
            <div class="flex flex-wrap gap-x-3 gap-y-1 text-[11px] text-[#94A3B8] mb-4">
                <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>{{ $t->question_count }} soal</span>
                <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>+{{ $t->time_limit_minutes }} Menit</span>
                <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>Acak Topik</span>
            </div>
            <div class="mt-auto border-t border-[#334155] pt-3 flex items-center justify-between gap-2">
                <span class="bg-[#334155] text-white text-[10px] font-semibold px-2 py-1 rounded whitespace-nowrap">{{ $t->badge }}</span>
                <a href="{{ route('mulai-tes', $t->id) }}" class="{{ $t->btn_color }} text-white text-xs font-bold px-4 py-2 rounded-lg flex items-center gap-1 transition-colors">Mulai Tes <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></a>
            </div>
        </div>
        @else
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-[#E2E8F0] flex flex-col hover:shadow-md transition-shadow">
            <div class="flex items-start space-x-3 mb-4">
                <div class="w-11 h-11 {{ $t->bg_color }} rounded-xl flex items-center justify-center flex-shrink-0">
                    @if($t->label)
                    <span class="{{ $t->icon_color }} font-bold text-xl">{{ $t->label }}</span>
                    @else
                    <svg class="w-5 h-5 {{ $t->icon_color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $t->icon }}"/></svg>
                    @endif
                </div>
                <div><h3 class="font-bold text-[#0F172A] text-[14px] leading-tight">{{ $t->title }}</h3><p class="text-[#64748B] text-[11px] mt-0.5 line-clamp-2">{{ $t->description }}</p></div>
            </div>
            <div class="flex flex-wrap items-center justify-between gap-y-1 text-[11px] text-[#94A3B8] mb-4">
                <div class="flex items-center gap-2">
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>{{ $t->question_count }} soal</span>
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>+{{ $t->time_limit_minutes }} Menit</span>
                </div>
                <span class="text-[9px] font-bold px-2 py-0.5 rounded uppercase {{ $levelClass[$t->level] ?? '' }}">{{ $t->level }}</span>
            </div>
            <div class="mt-auto">
                <a href="{{ route('mulai-tes', $t->id) }}" class="w-full {{ $t->btn_color }} text-white text-xs font-bold py-2.5 rounded-lg flex items-center justify-center gap-1.5 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Mulai Tes Topik Ini
                </a>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 border border-[#E2E8F0] text-[#64748B] hover:bg-[#F8FAFC] px-5 py-2.5 rounded-xl font-medium text-sm transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Dashboard
    </a>
</div>
@endsection
