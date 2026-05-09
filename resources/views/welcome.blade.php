@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="bg-white">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white border-b border-[#E2E8F0] shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-2.5 group">
                <img src="{{ asset('images/logo.png') }}" alt="Gaplify Logo" class="w-9 h-9 group-hover:scale-105 transition-transform">
                <span class="text-xl font-bold text-[#0F172A] group-hover:text-[#2563EB] transition-colors" style="font-family:'Poppins',sans-serif;"></span>
            </a>

            <!-- Nav Links (smooth scroll) -->
            <div class="hidden md:flex space-x-8 text-[15px] font-medium text-[#64748B]">
                <a href="#fitur" onclick="smoothScroll('fitur')" class="hover:text-[#2563EB] transition-colors cursor-pointer">Fitur</a>
                <a href="#cara-kerja" onclick="smoothScroll('cara-kerja')" class="hover:text-[#2563EB] transition-colors cursor-pointer">Cara Kerja</a>
                <a href="#topik" onclick="smoothScroll('topik')" class="hover:text-[#2563EB] transition-colors cursor-pointer">Testimoni</a>
            </div>

            <!-- Right: Auth / Logged-in -->
            @auth
            <div class="flex items-center space-x-2">
                <!-- Bell -->
                <button class="relative p-2 text-[#64748B] hover:text-[#2563EB] hover:bg-[#E0F2FE] rounded-full transition-colors" title="Notifikasi">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-[#EF4444] rounded-full border-2 border-white"></span>
                </button>

                <!-- Profile Avatar + Dropdown -->
                <div class="relative" id="profile-dropdown-wrap">
                    <button id="profile-btn" onclick="toggleDropdown()"
                        class="w-9 h-9 rounded-full bg-gradient-to-br from-[#2563EB] to-[#1d4ed8] flex items-center justify-center text-white font-bold text-sm shadow focus:outline-none hover:opacity-90 transition-opacity cursor-pointer">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </button>

                    <!-- Dropdown -->
                    <div id="profile-menu"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-[#E2E8F0] py-1 z-50">
                        <div class="px-4 py-3 border-b border-[#E2E8F0]">
                            <p class="text-sm font-semibold text-[#0F172A] truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-[#64748B] truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 px-4 py-2.5 text-sm text-[#0F172A] hover:bg-[#F8FAFC] hover:text-[#2563EB] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            <span>Dashboard</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center space-x-2 px-4 py-2.5 text-sm text-[#EF4444] hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-[15px] font-semibold text-[#64748B] hover:text-[#2563EB] transition-colors">Masuk</a>
                <a href="{{ route('register') }}" class="text-[15px] font-semibold bg-[#2563EB] text-white px-5 py-2.5 rounded-xl hover:bg-blue-700 transition-colors shadow-sm">Mulai Gratis</a>
            </div>
            @endauth
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gradient-to-b from-[#0F172A] via-blue-900 to-[#1e40af] py-24 text-center px-4 sm:px-6 lg:px-8">
        <span class="inline-flex items-center space-x-2 bg-blue-800/50 text-blue-200 text-xs font-semibold px-4 py-1.5 rounded-full mb-8 border border-blue-400/30">
            <svg width="14" height="14" class="flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
            <span>Platform Diagnostik Pembelajaran TKJ</span>
        </span>
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight max-w-4xl mx-auto" style="font-size:clamp(2.75rem,5vw,3.5rem);">
            Temukan <span class="text-[#06B6D4]">Skill Gap TKJ</span><br/>dan Belajar Lebih Terarah
        </h1>
        <p class="text-blue-100 mb-12 max-w-2xl mx-auto text-[16px] leading-relaxed">
            Gaplify adalah platform diagnostik dan rekomendasi pembelajaran untuk siswa SMK Teknik Komputer dan Jaringan. Ketahui kelemahanmu, perkuat kompetensimu.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-20">
            @auth
            <a href="{{ route('dashboard') }}" class="inline-flex items-center space-x-2 bg-[#2563EB] hover:bg-blue-500 text-white px-8 py-3.5 rounded-xl font-semibold text-[16px] transition-all hover:shadow-lg hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Dashboard Saya</span>
            </a>
            @else
            <a href="{{ route('register') }}" class="inline-flex items-center space-x-2 bg-[#2563EB] hover:bg-blue-500 text-white px-8 py-3.5 rounded-xl font-semibold text-[16px] transition-all hover:shadow-lg hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                <span>Mulai Tes Diagnostik</span>
            </a>
            <a href="{{ route('login') }}" class="inline-flex items-center space-x-2 bg-transparent border-2 border-blue-300 text-blue-100 hover:bg-blue-800/50 px-8 py-3.5 rounded-xl font-semibold text-[16px] transition-all hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Dashboard Guru</span>
            </a>
            @endauth
        </div>

        <div class="flex flex-wrap justify-center gap-10 md:gap-20 text-white border-t border-blue-500/30 pt-12 max-w-3xl mx-auto">
            @foreach([['48','SMK Bergabung'],['12K+','Tes Diselesaikan'],['96%','Kepuasan Siswa'],['200+','Soal Diagnostik']] as $s)
            <div class="text-center">
                <div class="text-4xl font-bold" style="font-family:'Inter',sans-serif;">{{ $s[0] }}</div>
                <div class="text-sm text-blue-200 mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Features Section -->
    <div id="fitur" class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto scroll-mt-20">
        <div class="text-center mb-16">
            <span class="text-[#2563EB] text-sm font-bold tracking-widest uppercase">FITUR UNGGULAN</span>
            <h2 class="text-[2rem] md:text-[2.5rem] font-bold text-[#0F172A] mt-3 mb-4">Semua yang Kamu Butuhkan untuk<br/>Belajar TKJ Lebih Efektif</h2>
            <p class="text-[#64748B] max-w-2xl mx-auto text-[16px]">Dirancang untuk kurikulum TKJ SMK dengan pendekatan berbasis data.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['icon'=>'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z','bg'=>'bg-blue-100','text'=>'text-[#2563EB]','title'=>'Tes Diagnostik','desc'=>'Kerjakan soal pilihan ganda yang komprehensif dari berbagai topik TKJ dan pilih topik spesifik atau tes semua topik sekaligus.'],
                ['icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z','bg'=>'bg-cyan-100','text'=>'text-[#06B6D4]','title'=>'Analisis Skill Gap','desc'=>'Lihat hasilmu dalam grafik visual yang mudah dipahami. Ketahui topik mana yang perlu diperkuat segera.'],
                ['icon'=>'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4','bg'=>'bg-green-100','text'=>'text-[#22C55E]','title'=>'Rekomendasi Materi','desc'=>'Dapatkan rekomendasi materi personal berdasarkan hasil analisismu. Belajar lebih terarah dan efisien.'],
                ['icon'=>'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z','bg'=>'bg-amber-100','text'=>'text-[#F59E0B]','title'=>'Monitoring Guru','desc'=>'Guru dapat memantau perkembangan seluruh siswa, melihat statistik kelas, dan mengidentifikasi yang perlu pendampingan.'],
                ['icon'=>'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z','bg'=>'bg-purple-100','text'=>'text-purple-600','title'=>'Responsif & Modern','desc'=>'Akses dari mana saja, di perangkat apa pun. Antarmuka modern dirancang agar nyaman dan mudah digunakan.'],
                ['icon'=>'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z','bg'=>'bg-red-100','text'=>'text-[#EF4444]','title'=>'Privasi Data Aman','desc'=>'Data kamu disimpan dengan aman dan tidak dibagikan kepada pihak ketiga tanpa izin.'],
            ] as $f)
            <div class="bg-white border border-[#E2E8F0] rounded-2xl p-7 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all">
                <div class="w-12 h-12 {{ $f['bg'] }} {{ $f['text'] }} rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $f['icon'] }}"></path></svg>
                </div>
                <h3 class="text-[18px] font-bold text-[#0F172A] mb-2">{{ $f['title'] }}</h3>
                <p class="text-[#64748B] text-[14px] leading-relaxed">{{ $f['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- How It Works -->
    <div id="cara-kerja" class="bg-[#E0F2FE] py-24 px-4 sm:px-6 lg:px-8 scroll-mt-20">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <span class="text-[#2563EB] text-sm font-bold tracking-widest uppercase">CARA KERJA</span>
                <h2 class="text-[2rem] md:text-[2.5rem] font-bold text-[#0F172A] mt-3">4 Langkah Mudah Menuju<br/>Pembelajaran Terarah</h2>
            </div>
            <div class="relative">
                <div class="hidden md:block absolute top-8 left-[12.5%] right-[12.5%] h-0.5 bg-[#2563EB]/20"></div>
                <div class="grid md:grid-cols-4 gap-8">
                    @foreach([
                        ['1','Pilih Topik','Pilih topik TKJ yang ingin diuji, atau pilih semua topik untuk tes komprehensif.'],
                        ['2','Kerjakan Tes','Jawab soal pilihan ganda seputar materi TKJ dengan suasana tenang tanpa batas waktu.'],
                        ['3','Lihat Analisis','Sistem otomatis menganalisis jawabanmu dan menampilkan grafik kemampuan per topik.'],
                        ['4','Dapatkan Rekomendasi','Terima materi yang dipersonalisasi sesuai skill gap dan pantau perkembanganmu.'],
                    ] as [$num,$title,$desc])
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto bg-[#2563EB] text-white rounded-full flex items-center justify-center text-2xl font-extrabold mb-5 relative z-10 border-4 border-[#E0F2FE] shadow-lg">{{ $num }}</div>
                        <h4 class="text-[18px] font-bold text-[#0F172A] mb-2">{{ $title }}</h4>
                        <p class="text-[#64748B] text-[14px] leading-relaxed">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Topics Section -->
    <div id="topik" class="py-24 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto text-center scroll-mt-20">
        <span class="text-[#2563EB] text-sm font-bold tracking-widest uppercase">TOPIK YANG DIUJIKAN</span>
        <h2 class="text-[2rem] md:text-[2.5rem] font-bold text-[#0F172A] mt-3 mb-5">Mencakup Seluruh Kompetensi TKJ</h2>
        <p class="text-[#64748B] mb-12 text-[16px]">Soal diagnostik dirancang mengacu pada silabus SMK TKJ Kurikulum Merdeka.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <!-- Jaringan Komputer -->
            <span class="inline-flex items-center space-x-2 bg-blue-100 text-[#2563EB] px-5 py-3 rounded-xl font-semibold text-[14px] hover:bg-blue-200 transition-colors cursor-default">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Jaringan Komputer</span>
            </span>
            <!-- IP Addressing -->
            <span class="inline-flex items-center space-x-2 bg-cyan-100 text-[#06B6D4] px-5 py-3 rounded-xl font-semibold text-[14px] hover:bg-cyan-200 transition-colors cursor-default">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/></svg>
                <span>IP Addressing</span>
            </span>
            <!-- Subnetting -->
            <span class="inline-flex items-center space-x-2 bg-amber-100 text-[#F59E0B] px-5 py-3 rounded-xl font-semibold text-[14px] hover:bg-amber-200 transition-colors cursor-default">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1 3 3 3h10c2 0 3-1 3-3V7c0-2-1-3-3-3H7C5 4 4 5 4 7zm4 0h8M8 12h8M8 17h8"/></svg>
                <span>Subnetting</span>
            </span>
            <!-- Konfigurasi Perangkat -->
            <span class="inline-flex items-center space-x-2 bg-green-100 text-[#22C55E] px-5 py-3 rounded-xl font-semibold text-[14px] hover:bg-green-200 transition-colors cursor-default">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065zM15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>Konfigurasi Perangkat</span>
            </span>
            <!-- Troubleshooting -->
            <span class="inline-flex items-center space-x-2 bg-red-100 text-[#EF4444] px-5 py-3 rounded-xl font-semibold text-[14px] hover:bg-red-200 transition-colors cursor-default">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                <span>Troubleshooting</span>
            </span>
            <!-- Keamanan Jaringan -->
            <span class="inline-flex items-center space-x-2 bg-purple-100 text-purple-600 px-5 py-3 rounded-xl font-semibold text-[14px] hover:bg-purple-200 transition-colors cursor-default">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <span>Keamanan Jaringan</span>
            </span>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-[#0F172A] to-blue-900 py-20 px-4 sm:px-6 lg:px-8 text-center text-white">
        <h2 class="text-[2rem] md:text-[2.5rem] font-bold mb-4">Siap Meningkatkan Kompetensi TKJ-mu?</h2>
        <p class="text-blue-200 mb-10 max-w-2xl mx-auto text-[16px]">Bergabunglah dengan ribuan siswa SMK yang sudah belajar lebih terarah bersama Gaplify.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            @auth
            <a href="{{ route('dashboard') }}" class="inline-flex items-center space-x-2 bg-[#2563EB] hover:bg-blue-500 px-8 py-3.5 rounded-xl font-semibold text-[16px] transition-all hover:shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                <span>Ke Dashboard Saya</span>
            </a>
            @else
            <a href="{{ route('register') }}" class="inline-flex items-center space-x-2 bg-[#2563EB] hover:bg-blue-500 px-8 py-3.5 rounded-xl font-semibold text-[16px] transition-all hover:shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                <span>Mulai Tes Sekarang Gratis!</span>
            </a>
            <a href="{{ route('login') }}" class="inline-flex items-center space-x-2 bg-transparent border-2 border-blue-400 hover:bg-blue-800/50 px-8 py-3.5 rounded-xl font-semibold text-[16px] transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Untuk Guru dan Sekolah</span>
            </a>
            @endauth
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#0F172A] text-[#64748B] py-14 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center space-x-3 mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Gaplify Logo" class="w-9 h-9">
                    <span class="text-xl font-bold text-white" style="font-family:'Poppins',sans-serif;">Gaplify</span>
                </div>
                <p class="text-[14px] mb-5 leading-relaxed">Platform Diagnostik dan Rekomendasi Pembelajaran TKJ untuk siswa SMK.</p>
                <div class="flex space-x-4 text-[13px]">
                    <a href="#" class="hover:text-white transition-colors">Facebook</a>
                    <a href="#" class="hover:text-white transition-colors">Twitter</a>
                    <a href="#" class="hover:text-white transition-colors">Instagram</a>
                </div>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4 text-[15px]">Beranda</h4>
                <ul class="space-y-2 text-[14px]">
                    <li><a href="#fitur" onclick="smoothScroll('fitur')" class="hover:text-white transition-colors cursor-pointer">Tes Diagnostik</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Materi</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Dashboard Guru</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Masuk</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4 text-[15px]">Bantuan</h4>
                <ul class="space-y-2 text-[14px]">
                    <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Kontak Kami</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Panduan Pengguna</a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto mt-10 pt-8 border-t border-gray-800 text-[13px] text-center">
            <p>&copy; {{ date('Y') }} Gaplify. All Rights Reserved.</p>
        </div>
    </footer>
</div>

<script>
function smoothScroll(id) {
    event.preventDefault();
    const el = document.getElementById(id);
    if (el) el.scrollIntoView({ behavior: 'smooth' });
}

function toggleDropdown() {
    const menu = document.getElementById('profile-menu');
    menu.classList.toggle('hidden');
}

// Close dropdown when clicking outside
document.addEventListener('click', function(e) {
    const wrap = document.getElementById('profile-dropdown-wrap');
    if (wrap && !wrap.contains(e.target)) {
        document.getElementById('profile-menu').classList.add('hidden');
    }
});
</script>
@endsection
