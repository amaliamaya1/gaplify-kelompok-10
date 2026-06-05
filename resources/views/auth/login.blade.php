<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gaplify - Masuk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-[#dbeafe] font-sans text-gray-900 antialiased min-h-screen flex flex-col items-center justify-center py-10 px-4">
    
    <div class="w-full max-w-[480px] bg-white rounded-[2rem] shadow-lg p-10">
        <!-- Logo Header -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.png') }}" alt="Gaplify Logo" class="w-16 h-16 mx-auto mb-3">
            <h1 class="text-3xl font-extrabold text-[#0F172A] mb-1" style="font-family: 'Poppins', sans-serif;">Gaplify</h1>
            <p class="text-[13px] text-gray-500 font-medium">Platform Diagnostik Pembelajaran TKJ</p>
        </div>

        @if ($errors->any())
        <div class="mb-6 bg-red-50 p-4 rounded-xl border border-red-100">
            <ul class="list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        @if (session('success'))
        <div class="mb-6 bg-green-50 p-4 rounded-xl border border-green-100">
            <p class="text-sm text-green-600">{{ session('success') }}</p>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            
            <!-- Email -->
            <div>
                <label for="email" class="block text-[14px] font-bold text-gray-900 mb-1.5">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="block w-full pl-11 pr-4 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                        placeholder="Masukkan email anda">
                </div>
            </div>

            <!-- Kata Sandi -->
            <div x-data="{ show: false }">
                <label for="password" class="block text-[14px] font-bold text-gray-900 mb-1.5">Kata Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <input id="password" :type="show ? 'text' : 'password'" name="password" required
                        class="block w-full pl-11 pr-11 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                        placeholder="Masukkan kata sandi anda">
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer text-gray-400 hover:text-gray-600" @click="show = !show">
                        <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                    </div>
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 w-4 h-4" name="remember">
                    <span class="ml-2 text-[13px] font-medium text-gray-600">Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-[13px] font-bold text-blue-600 hover:text-blue-800 transition-colors" href="{{ route('password.request') }}">
                        Lupa kata sandi?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit" class="w-full bg-[#2563EB] hover:bg-blue-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-sm transition-all text-sm">
                    Masuk ke Gaplify
                </button>
            </div>
            
            <!-- Register Link -->
            <div class="text-center pt-4">
                <p class="text-[14px] text-gray-600 font-medium">Belum punya akun? <a href="{{ route('register') }}" class="text-gray-900 font-bold hover:underline">Daftar</a></p>
            </div>
        </form>
    </div>

</body>
</html>
