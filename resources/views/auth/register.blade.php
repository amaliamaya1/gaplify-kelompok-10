@extends('layouts.app')

@section('title', 'Daftar Akun')

@section('content')
<div class="min-h-screen flex items-center justify-center p-4 py-10" style="background:#F8FAFC;">
    <div class="bg-white rounded-3xl shadow-sm p-8 sm:p-12 w-full max-w-md border border-[#E2E8F0]">

        <!-- Header -->
        <div class="text-center mb-10">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Gaplify Logo" class="w-14 h-14 object-contain">
            </div>
            <h1 class="text-[28px] font-bold text-[#0F172A] mb-1" style="font-family:'Poppins',sans-serif;">Gaplify</h1>
            <p class="text-[14px] text-[#64748B]">Platform Diagnostik Pembelajaran TKJ</p>
        </div>

        @if ($errors->any())
            <div class="mb-5 bg-red-50 text-[#EF4444] border border-red-200 p-3 rounded-xl text-[14px]">
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama Lengkap -->
            <div class="mb-5">
                <label for="name" class="block text-[14px] font-semibold text-[#0F172A] mb-2">Nama Lengkap</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="block w-full pl-10 pr-3 py-3 border border-[#E2E8F0] rounded-xl focus:ring-2 focus:ring-[#2563EB] focus:border-[#2563EB] text-[15px] text-[#0F172A] transition-all outline-none"
                        placeholder="Masukkan nama lengkap anda">
                </div>
            </div>

            <!-- Email -->
            <div class="mb-5">
                <label for="email" class="block text-[14px] font-semibold text-[#0F172A] mb-2">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="block w-full pl-10 pr-3 py-3 border border-[#E2E8F0] rounded-xl focus:ring-2 focus:ring-[#2563EB] focus:border-[#2563EB] text-[15px] text-[#0F172A] transition-all outline-none"
                        placeholder="Masukkan email anda">
                </div>
            </div>

            <!-- Password -->
            <div class="mb-5">
                <label for="password" class="block text-[14px] font-semibold text-[#0F172A] mb-2">Kata Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <input id="password" type="password" name="password" required
                        class="block w-full pl-10 pr-12 py-3 border border-[#E2E8F0] rounded-xl focus:ring-2 focus:ring-[#2563EB] focus:border-[#2563EB] text-[15px] text-[#0F172A] transition-all outline-none"
                        placeholder="Masukkan kata sandi anda">
                    <button type="button" onclick="togglePass('password','eye-pass')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#64748B] hover:text-[#2563EB] transition-colors">
                        <svg id="eye-pass" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-[14px] font-semibold text-[#0F172A] mb-2">Konfirmasi Kata Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="block w-full pl-10 pr-12 py-3 border border-[#E2E8F0] rounded-xl focus:ring-2 focus:ring-[#2563EB] focus:border-[#2563EB] text-[15px] text-[#0F172A] transition-all outline-none"
                        placeholder="Konfirmasi kata sandi anda">
                    <button type="button" onclick="togglePass('password_confirmation','eye-confirm')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#64748B] hover:text-[#2563EB] transition-colors">
                        <svg id="eye-confirm" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-8">
                <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-[#2563EB] focus:ring-[#2563EB] border-[#E2E8F0] rounded">
                <label for="remember" class="ml-2 text-[14px] text-[#64748B]">Ingat saya</label>
            </div>

            <button type="submit"
                class="w-full py-3 px-4 bg-[#2563EB] hover:bg-blue-700 text-white font-semibold text-[16px] rounded-xl transition-colors shadow-sm">
                Daftar ke Gaplify
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-[14px] text-[#64748B]">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-bold text-[#0F172A] hover:text-[#2563EB] transition-colors">Masuk</a>
            </p>
        </div>
    </div>
</div>

<script>
function togglePass(inputId, eyeId) {
    const input = document.getElementById(inputId);
    const eye = document.getElementById(eyeId);
    if (input.type === 'password') {
        input.type = 'text';
        eye.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>';
    } else {
        input.type = 'password';
        eye.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
    }
}
</script>
@endsection
