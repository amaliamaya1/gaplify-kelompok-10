@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen flex" style="background:#F8FAFC;">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-[#E2E8F0] flex flex-col flex-shrink-0">
        <!-- Logo (klik → landing page) -->
        <div class="px-6 py-5 border-b border-[#E2E8F0]">
            <a href="{{ route('home') }}" class="flex items-center space-x-2.5 group">
                <img src="{{ asset('images/logo.png') }}" alt="Gaplify" class="w-9 h-9 group-hover:scale-105 transition-transform">
                <span class="text-xl font-bold text-[#0F172A] group-hover:text-[#2563EB] transition-colors" style="font-family:'Poppins',sans-serif;">Gaplify</span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <p class="text-xs font-semibold text-[#64748B] uppercase tracking-wider px-3 mb-3">Menu Utama</p>

            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl bg-[#E0F2FE] text-[#2563EB] font-semibold text-[14px]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Dashboard</span>
            </a>
            <a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-[#64748B] hover:bg-[#F8FAFC] hover:text-[#2563EB] font-medium text-[14px] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <span>Tes Diagnostik</span>
            </a>
            <a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-[#64748B] hover:bg-[#F8FAFC] hover:text-[#2563EB] font-medium text-[14px] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                <span>Analisis Skill Gap</span>
            </a>
            <a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-[#64748B] hover:bg-[#F8FAFC] hover:text-[#2563EB] font-medium text-[14px] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                <span>Rekomendasi Materi</span>
            </a>
            <div class="pt-4">
                <p class="text-xs font-semibold text-[#64748B] uppercase tracking-wider px-3 mb-3">Akun</p>
                <a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-[#64748B] hover:bg-[#F8FAFC] hover:text-[#2563EB] font-medium text-[14px] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span>Profil Saya</span>
                </a>
            </div>
        </nav>

        <!-- Logout -->
        <div class="px-4 py-4 border-t border-[#E2E8F0]">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center space-x-3 px-3 py-2.5 w-full rounded-xl text-[#EF4444] hover:bg-red-50 font-medium text-[14px] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- Top Header -->
        <header class="bg-white border-b border-[#E2E8F0] px-8 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-[22px] font-bold text-[#0F172A]">Dashboard</h1>
                <p class="text-[14px] text-[#64748B]">Selamat datang, <span class="font-semibold text-[#2563EB]">{{ Auth::user()->name }}</span> </p>
            </div>
            <div class="flex items-center space-x-2">
                <!-- Bell -->
                <button class="relative p-2 text-[#64748B] hover:text-[#2563EB] hover:bg-[#E0F2FE] rounded-full transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-[#EF4444] rounded-full border-2 border-white"></span>
                </button>
                <!-- Profile -->
                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-[#2563EB] to-[#1d4ed8] flex items-center justify-center text-white font-bold text-sm shadow">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 overflow-y-auto p-8">
        </main>
    </div>
</div>
@endsection
