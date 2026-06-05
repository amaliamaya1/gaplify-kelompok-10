@extends('layouts.dashboard')

@section('title', 'Profil Saya')
@section('header_title', 'Profil Saya')

@section('dashboard_content')
<div class="bg-white rounded-[20px] shadow-sm border border-[#E2E8F0] p-8 text-center py-16">
    <div class="w-20 h-20 bg-[#EFF6FF] rounded-full flex items-center justify-center mx-auto mb-5">
        <svg class="w-10 h-10 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
    </div>
    <h2 class="text-2xl font-bold text-[#0F172A] mb-3">Halaman Profil Saya</h2>
    <p class="text-[#64748B] max-w-md mx-auto mb-8">
        Halaman ini sedang dalam tahap pengembangan. Pengaturan akun dan profil siswa akan ditampilkan di sini.
    </p>
    <a href="{{ route('dashboard') }}" class="inline-flex items-center space-x-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white px-6 py-3 rounded-xl font-medium transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        <span>Kembali ke Dashboard</span>
    </a>
</div>
@endsection
