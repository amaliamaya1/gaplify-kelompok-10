@extends('layouts.app')

@section('content')
<div class="h-screen flex overflow-hidden bg-[#F8FAFC]">

    <!-- Sidebar (Fixed) -->
    <aside class="w-64 bg-[#0F172A] flex flex-col flex-shrink-0 shadow-xl transition-all duration-300">
        <!-- Logo -->
        <div class="px-6 py-6 border-b border-[#1E293B]">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center font-bold text-[#2563EB] text-[22px]">
                    <img src="{{ asset('images/logo.png') }}" alt="G" class="w-6 h-6 object-contain" onerror="this.outerHTML='<span class=\'font-bold text-xl\'>G</span>'">
                </div>
                <div>
                    <span class="text-[18px] font-bold text-white group-hover:text-gray-300 transition-colors tracking-wide" style="font-family:'Poppins',sans-serif;">Gaplify</span>
                    <span class="block text-[10px] text-[#94A3B8] font-medium tracking-wider">Platform TKJ</span>
                </div>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 py-6 space-y-1 overflow-y-auto">
            <p class="text-[11px] font-semibold text-[#64748B] uppercase tracking-wider px-6 mb-3">Menu Siswa</p>

            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-6 py-3 {{ request()->routeIs('dashboard') ? 'bg-[#1E293B] border-l-[3px] border-[#2563EB] text-white' : 'border-l-[3px] border-transparent text-[#94A3B8] hover:bg-[#1E293B] hover:text-white' }} font-medium text-[14px] transition-colors">
                <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'opacity-90' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('student.test.index') }}" class="flex items-center space-x-3 px-6 py-3 {{ request()->routeIs('student.test.*') ? 'bg-[#1E293B] border-l-[3px] border-[#2563EB] text-white' : 'border-l-[3px] border-transparent text-[#94A3B8] hover:bg-[#1E293B] hover:text-white' }} font-medium text-[14px] transition-colors">
                <svg class="w-5 h-5 {{ request()->routeIs('student.test.*') ? 'opacity-90' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <span>Tes Diagnostik</span>
            </a>
            <a href="{{ url('student/dashboard') }}" class="flex items-center space-x-3 px-6 py-3 {{ request()->routeIs('student.analysis.*') ? 'bg-[#1E293B] border-l-[3px] border-[#2563EB] text-white' : 'border-l-[3px] border-transparent text-[#94A3B8] hover:bg-[#1E293B] hover:text-white' }} font-medium text-[14px] transition-colors">
                <svg class="w-5 h-5 {{ request()->routeIs('student.analysis.*') ? 'opacity-90' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                <span>Hasil Analisis</span>
            </a>
            <a href="{{ route('student.recommendations.index') }}" class="flex items-center space-x-3 px-6 py-3 {{ request()->routeIs('student.recommendations.*') ? 'bg-[#1E293B] border-l-[3px] border-[#2563EB] text-white' : 'border-l-[3px] border-transparent text-[#94A3B8] hover:bg-[#1E293B] hover:text-white' }} font-medium text-[14px] transition-colors">
                <svg class="w-5 h-5 {{ request()->routeIs('student.recommendations.*') ? 'opacity-90' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <span>Rekomendasi Materi</span>
            </a>
            
            <div class="pt-6">
                <p class="text-[11px] font-semibold text-[#64748B] uppercase tracking-wider px-6 mb-3">Akun</p>
                <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 px-6 py-3 {{ request()->routeIs('profile.*') ? 'bg-[#1E293B] border-l-[3px] border-[#2563EB] text-white' : 'border-l-[3px] border-transparent text-[#94A3B8] hover:bg-[#1E293B] hover:text-white' }} font-medium text-[14px] transition-colors">
                    <svg class="w-5 h-5 {{ request()->routeIs('profile.*') ? 'opacity-90' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span>Profil Saya</span>
                </a>
            </div>
        </nav>

        <!-- Profile & Logout (Bottom) -->
        <div class="px-6 py-4 border-t border-[#1E293B]">
            <div class="flex items-center justify-between group">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-cover bg-center border border-[#1E293B]" style="background-image: url('https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Ahn Keonho') }}&background=2563EB&color=fff')"></div>
                    <div>
                        <p class="text-sm font-bold text-white whitespace-nowrap overflow-hidden text-ellipsis w-[100px]">{{ Auth::user()->name ?? 'Ahn Keonho' }}</p>
                        <p class="text-[11px] text-[#94A3B8]">Siswa X TKJ 2</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="p-2 text-[#94A3B8] hover:text-white hover:bg-[#1E293B] rounded-lg transition-colors" title="Keluar">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area (Scrollable) -->
    <div class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header / Navbar (Fixed) -->
        <header class="bg-white px-8 py-4 flex items-center justify-between flex-shrink-0 z-10 border-b border-[#E2E8F0]">
            <div>
                <h1 class="text-[15px] font-bold text-[#0F172A]">@yield('header_title', 'Dashboard Siswa')</h1>
            </div>
            <div class="flex items-center space-x-4">
                <button class="relative p-2 text-[#64748B] hover:text-[#2563EB] transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-[#EF4444] rounded-full border-2 border-white"></span>
                </button>
                <div class="w-9 h-9 rounded-full bg-cover bg-center ring-2 ring-white shadow-sm" style="background-image: url('https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Ahn Keonho') }}&background=2563EB&color=fff')"></div>
            </div>
        </header>

        <!-- Scrollable Main -->
        <main class="flex-1 overflow-y-auto p-8">
            <div class="max-w-6xl mx-auto space-y-6 pb-12">
                @yield('dashboard_content')
            </div>
        </main>
    </div>
</div>
@endsection
