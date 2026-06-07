<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center w-full">
            <span class="font-bold text-[#0F172A] text-[20px]">{{ __('Pengaturan Akun') }}</span>
        </div>
    </x-slot>

    <div class="bg-[#f8fafc]">
        <!-- Header Banner & User Info combined -->
        <div class="w-full bg-gradient-to-r from-[#1E3A8A] via-[#2563EB] to-[#3B82F6] relative overflow-hidden pb-10">
            <!-- Decorative circles -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-48 h-48 bg-white opacity-10 rounded-full blur-2xl"></div>
            
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 relative z-10 px-4 pt-12 pb-4">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
                    <div class="w-28 h-28 bg-[#EFF6FF] rounded-full border-4 border-white shadow-xl flex items-center justify-center text-4xl font-bold text-[#2563EB] shrink-0 overflow-hidden">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        @endif
                    </div>
                    <div class="text-center sm:text-left pt-2 text-white">
                        <h2 class="text-3xl font-bold tracking-tight drop-shadow-md">{{ Auth::user()->name }}</h2>
                        <p class="flex items-center justify-center sm:justify-start gap-1.5 mt-1 font-medium text-blue-100 drop-shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            {{ Auth::user()->email }}
                        </p>
                        <div class="mt-4 flex flex-wrap gap-3 justify-center sm:justify-start">
                            <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-white/20 backdrop-blur-md text-white text-xs font-bold border border-white/30 shadow-sm">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                Akun Aktif
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-white text-xs font-bold border border-white/20 capitalize shadow-sm">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                Peran: {{ Auth::user()->role ?? 'Siswa' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 relative z-10 px-4 py-12">

            {{-- Update Profile Information --}}
            <div class="bg-white rounded-3xl shadow-sm border border-[#E2E8F0] overflow-hidden mb-8 transition-all hover:shadow-md">
                <div class="md:grid md:grid-cols-3">
                    <div class="md:col-span-1 bg-gradient-to-b from-[#F8FAFC] to-white p-6 sm:p-8 border-b md:border-b-0 md:border-r border-[#E2E8F0] flex flex-col justify-center">
                        <div class="w-12 h-12 bg-[#EFF6FF] rounded-2xl flex items-center justify-center mb-5 text-[#2563EB] shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#0F172A] tracking-tight">Informasi Profil</h3>
                        <p class="mt-2 text-sm text-[#64748B] leading-relaxed">Perbarui informasi dasar profil dan alamat email Anda. Pastikan email yang digunakan selalu aktif.</p>
                    </div>
                    <div class="md:col-span-2 p-6 sm:p-8 flex items-center">
                        <div class="w-full">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>
            </div>

            {{-- Update Password --}}
            <div class="bg-white rounded-3xl shadow-sm border border-[#E2E8F0] overflow-hidden mb-8 transition-all hover:shadow-md">
                <div class="md:grid md:grid-cols-3">
                    <div class="md:col-span-1 bg-gradient-to-b from-[#F8FAFC] to-white p-6 sm:p-8 border-b md:border-b-0 md:border-r border-[#E2E8F0] flex flex-col justify-center">
                        <div class="w-12 h-12 bg-[#FEF2F2] rounded-2xl flex items-center justify-center mb-5 text-[#EF4444] shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#0F172A] tracking-tight">Keamanan Akun</h3>
                        <p class="mt-2 text-sm text-[#64748B] leading-relaxed">Perbarui kata sandi Anda secara berkala untuk menjaga akun tetap aman dari akses yang tidak sah.</p>
                    </div>
                    <div class="md:col-span-2 p-6 sm:p-8 flex items-center">
                        <div class="w-full">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>

            {{-- Delete Account --}}
            <div class="bg-white rounded-3xl shadow-sm border border-[#E2E8F0] overflow-hidden transition-all hover:shadow-md border-b-4 border-b-[#EF4444]/20">
                <div class="md:grid md:grid-cols-3">
                    <div class="md:col-span-1 bg-gradient-to-b from-[#FEF2F2]/50 to-white p-6 sm:p-8 border-b md:border-b-0 md:border-r border-[#E2E8F0] flex flex-col justify-center">
                        <div class="w-12 h-12 bg-white border border-[#FECACA] rounded-2xl flex items-center justify-center mb-5 text-[#EF4444] shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#EF4444] tracking-tight">Hapus Akun</h3>
                        <p class="mt-2 text-sm text-[#64748B] leading-relaxed">Tindakan ini bersifat permanen. Semua data dan progres Anda akan dihapus dan tidak dapat dipulihkan.</p>
                    </div>
                    <div class="md:col-span-2 p-6 sm:p-8 flex items-center">
                        <div class="w-full">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>