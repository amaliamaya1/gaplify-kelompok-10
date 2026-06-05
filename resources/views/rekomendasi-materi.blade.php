@extends('layouts.dashboard')

@section('title', 'Rekomendasi Materi')
@section('header_title', 'Rekomendasi Belajar')

@section('dashboard_content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="bg-gradient-to-br from-[#0F172A] to-[#1E3A8A] rounded-2xl p-8 text-white shadow-md relative overflow-hidden">
        <!-- Abstract Decoration -->
        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-5 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-48 h-48 rounded-full bg-[#3B82F6] opacity-20 blur-2xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center md:items-start justify-between gap-6">
            <div>
                <h2 class="text-2xl font-bold mb-2">Modul Pembelajaran Khusus Untukmu</h2>
                <p class="text-[#94A3B8] text-sm leading-relaxed max-w-2xl">
                    Berdasarkan hasil tes diagnostik terakhir, sistem kami telah menyusun daftar materi ini untuk membantu meningkatkan pemahamanmu pada topik yang masih perlu perbaikan.
                </p>
            </div>
            <div class="bg-[#1E293B] border border-[#334155] rounded-xl px-5 py-3 text-center flex-shrink-0">
                <span class="block text-xs font-medium text-[#94A3B8] mb-1">Target Penyelesaian</span>
                <span class="block text-xl font-bold text-white">Minggu Ini</span>
            </div>
        </div>
    </div>

    <!-- Recommendations Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Prioritas Utama -->
        <div class="lg:col-span-2 space-y-6">
            
            <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-2">
                <h3 class="font-bold text-[#0F172A] flex items-center space-x-2">
                    <svg class="w-5 h-5 text-[#EF4444]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span>Prioritas Utama (Perlu Perbaikan)</span>
                </h3>
            </div>

            <!-- Material Card 1: Subnetting -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2E8F0] hover:shadow-md transition-shadow group flex flex-col sm:flex-row gap-5">
                <!-- Thumbnail -->
                <div class="w-full sm:w-40 aspect-video sm:aspect-square rounded-xl bg-[#FEF3C7] flex items-center justify-center flex-shrink-0 relative overflow-hidden">
                    <svg class="w-10 h-10 text-[#F59E0B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    <div class="absolute bottom-2 right-2 bg-black/60 text-white text-[10px] font-bold px-1.5 py-0.5 rounded">15:40</div>
                </div>
                <!-- Content -->
                <div class="flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <span class="bg-[#FEF2F2] text-[#EF4444] text-[10px] font-bold px-2 py-1 rounded-md mb-2 inline-block">Subnetting</span>
                            <h4 class="font-bold text-[#0F172A] text-lg leading-tight group-hover:text-[#2563EB] transition-colors">Cara Mudah Menghitung Subnet Mask</h4>
                        </div>
                    </div>
                    <p class="text-[#64748B] text-xs leading-relaxed mb-4 line-clamp-2">Pelajari teknik cepat menghitung subnet mask, jumlah host, dan network address menggunakan metode CIDR (Classless Inter-Domain Routing).</p>
                    
                    <div class="mt-auto flex flex-wrap items-center justify-between gap-3 border-t border-[#F1F5F9] pt-4">
                        <div class="flex items-center space-x-3 text-[11px] text-[#64748B]">
                            <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg> Video Pembelajaran</span>
                            <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> 15 Menit</span>
                        </div>
                        <button class="bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-xs font-semibold px-4 py-2 rounded-lg transition-colors">Mulai Belajar</button>
                    </div>
                </div>
            </div>

            <!-- Material Card 2: Konfigurasi -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2E8F0] hover:shadow-md transition-shadow group flex flex-col sm:flex-row gap-5">
                <!-- Thumbnail -->
                <div class="w-full sm:w-40 aspect-video sm:aspect-square rounded-xl bg-[#DCFCE7] flex items-center justify-center flex-shrink-0 relative overflow-hidden">
                    <svg class="w-10 h-10 text-[#22C55E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <!-- Content -->
                <div class="flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <span class="bg-[#FEF3C7] text-[#D97706] text-[10px] font-bold px-2 py-1 rounded-md mb-2 inline-block">Konfigurasi Perangkat</span>
                            <h4 class="font-bold text-[#0F172A] text-lg leading-tight group-hover:text-[#2563EB] transition-colors">Dasar Command Line Interface (CLI) Cisco</h4>
                        </div>
                    </div>
                    <p class="text-[#64748B] text-xs leading-relaxed mb-4 line-clamp-2">Artikel interaktif tentang cara menggunakan CLI pada router dan switch Cisco, mulai dari User EXEC mode hingga Global Configuration.</p>
                    
                    <div class="mt-auto flex flex-wrap items-center justify-between gap-3 border-t border-[#F1F5F9] pt-4">
                        <div class="flex items-center space-x-3 text-[11px] text-[#64748B]">
                            <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg> Artikel Panduan</span>
                            <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Est. 10 Menit</span>
                        </div>
                        <button class="bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-xs font-semibold px-4 py-2 rounded-lg transition-colors">Mulai Belajar</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Sidebar (Latihan & Progress) -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Progress Belajar -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2E8F0]">
                <h3 class="font-bold text-[#0F172A] mb-4">Progress Belajarmu</h3>
                <div class="relative w-32 h-32 mx-auto mb-4">
                    <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                        <!-- Background Circle -->
                        <path class="text-[#F1F5F9]" stroke-width="3" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                        <!-- Progress Circle -->
                        <path class="text-[#2563EB]" stroke-dasharray="0, 100" stroke-width="3" stroke-linecap="round" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-2xl font-bold text-[#0F172A]">0%</span>
                        <span class="text-[10px] text-[#64748B]">Selesai</span>
                    </div>
                </div>
                <p class="text-xs text-center text-[#64748B]">Selesaikan modul rekomendasi untuk meningkatkan progressmu.</p>
            </div>

            <!-- Modul Pengayaan -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2E8F0]">
                <h3 class="font-bold text-[#0F172A] mb-4 border-b border-[#F1F5F9] pb-3">Modul Pengayaan</h3>
                <p class="text-[#64748B] text-xs mb-4">Materi tambahan untuk memperdalam topik yang sudah kamu kuasai.</p>
                
                <div class="space-y-4">
                    <!-- Item -->
                    <a href="#" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 rounded-lg bg-[#EFF6FF] flex items-center justify-center flex-shrink-0 group-hover:bg-[#2563EB] transition-colors">
                            <svg class="w-5 h-5 text-[#2563EB] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <div>
                            <h5 class="text-sm font-bold text-[#0F172A] group-hover:text-[#2563EB] transition-colors line-clamp-1">Troubleshooting Lanjutan</h5>
                            <span class="text-[10px] text-[#64748B]">Artikel • 8 Menit</span>
                        </div>
                    </a>
                    
                    <!-- Item -->
                    <a href="#" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 rounded-lg bg-[#EFF6FF] flex items-center justify-center flex-shrink-0 group-hover:bg-[#2563EB] transition-colors">
                            <svg class="w-5 h-5 text-[#2563EB] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <div>
                            <h5 class="text-sm font-bold text-[#0F172A] group-hover:text-[#2563EB] transition-colors line-clamp-1">Best Practice Keamanan</h5>
                            <span class="text-[10px] text-[#64748B]">Latihan Interaktif</span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
