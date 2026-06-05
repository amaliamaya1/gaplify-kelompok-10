<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center w-full">
            <span class="font-bold text-[#0F172A] text-[20px]">{{ __('Pengaturan Akun') }}</span>
        </div>
    </x-slot>

    <div class="bg-[#f8fafc] -m-8">

        {{-- ===== BLUE PROFILE HEADER ===== --}}
        <div class="w-full bg-[#2563EB] px-8 py-8 flex items-center gap-5">

            {{-- Avatar --}}
            <div class="w-[80px] h-[80px] rounded-full border-[3px] border-white shadow-md overflow-hidden flex items-center justify-center bg-blue-400 text-white text-2xl font-bold shrink-0">
                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                @else
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                @endif
            </div>

            {{-- User Info --}}
            <div class="min-w-0">
                <h2 class="text-[22px] font-bold text-white leading-snug truncate">{{ Auth::user()->name }}</h2>
                <p class="flex items-center gap-1.5 mt-0.5 text-[13px] text-blue-100">
                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    {{ Auth::user()->email }}
                </p>
                <div class="mt-3 flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-white/20 text-white text-[11px] font-bold uppercase tracking-wide border border-white/30">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                        Akun Aktif
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-white/20 text-white text-[11px] font-bold uppercase tracking-wide border border-white/30 capitalize">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Peran: {{ ucfirst(Auth::user()->role ?? 'Student') }}
                    </span>
                </div>
            </div>
        </div>

        {{-- ===== CARD SECTION ===== --}}
        <div class="px-8 py-8 space-y-5 max-w-5xl">

            {{-- Informasi Profil --}}
            <div class="bg-white rounded-2xl shadow-sm border border-[#E2E8F0] overflow-hidden hover:shadow-md transition-all duration-200">
                <div class="flex flex-col md:flex-row min-h-[200px]">
                    {{-- Left Panel --}}
                    <div class="md:w-[220px] shrink-0 p-7 border-b md:border-b-0 md:border-r border-[#E2E8F0] bg-[#F8FAFC] flex flex-col justify-start">
                        <div class="w-10 h-10 bg-[#EFF6FF] rounded-xl flex items-center justify-center mb-4 text-[#2563EB]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                            </svg>
                        </div>
                        <h3 class="text-[15px] font-bold text-[#0F172A] leading-tight">Informasi Profil</h3>
                        <p class="mt-2 text-[13px] text-[#64748B] leading-relaxed">Perbarui informasi dasar profil dan alamat email Anda. Pastikan email yang digunakan selalu aktif.</p>
                    </div>
                    {{-- Right Panel --}}
                    <div class="flex-1 p-7">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            {{-- Keamanan Akun --}}
            <div class="bg-white rounded-2xl shadow-sm border border-[#E2E8F0] overflow-hidden hover:shadow-md transition-all duration-200">
                <div class="flex flex-col md:flex-row min-h-[200px]">
                    {{-- Left Panel --}}
                    <div class="md:w-[220px] shrink-0 p-7 border-b md:border-b-0 md:border-r border-[#E2E8F0] bg-[#F8FAFC] flex flex-col justify-start">
                        <div class="w-10 h-10 bg-[#FEF2F2] rounded-xl flex items-center justify-center mb-4 text-[#EF4444]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <h3 class="text-[15px] font-bold text-[#0F172A] leading-tight">Keamanan Akun</h3>
                        <p class="mt-2 text-[13px] text-[#64748B] leading-relaxed">Perbarui kata sandi Anda secara berkala untuk menjaga akun tetap aman dari akses yang tidak sah.</p>
                    </div>
                    {{-- Right Panel --}}
                    <div class="flex-1 p-7">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            {{-- Hapus Akun --}}
            <div class="bg-white rounded-2xl shadow-sm border border-[#E2E8F0] overflow-hidden hover:shadow-md transition-all duration-200">
                <div class="flex flex-col md:flex-row min-h-[160px]">
                    {{-- Left Panel --}}
                    <div class="md:w-[220px] shrink-0 p-7 border-b md:border-b-0 md:border-r border-[#E2E8F0] bg-[#FFF5F5] flex flex-col justify-start">
                        <div class="w-10 h-10 bg-white border border-[#FECACA] rounded-xl flex items-center justify-center mb-4 text-[#EF4444]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <h3 class="text-[15px] font-bold text-[#EF4444] leading-tight">Hapus Akun</h3>
                        <p class="mt-2 text-[13px] text-[#64748B] leading-relaxed">Tindakan ini bersifat permanen. Semua data dan progres Anda akan dihapus dan tidak dapat dipulihkan.</p>
                    </div>
                    {{-- Right Panel --}}
                    <div class="flex-1 p-7 flex items-start">
                        <div class="w-full">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- end cards --}}
    </div>
</x-app-layout>
