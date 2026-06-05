<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Gaplify') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="font-sans antialiased bg-[#f8fafc] flex h-screen overflow-hidden text-gray-900">

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Header -->
        <header class="bg-white border-b border-gray-100 h-[72px] flex items-center justify-between px-8 shrink-0">
            <h1 class="text-[16px] font-bold text-gray-800">
                {{ $header ?? 'Dashboard' }}
            </h1>
            <div class="flex items-center space-x-6" x-data="{ hasUnread: localStorage.getItem('notifications_read') !== 'true' }">
                <a href="{{ route('notifications.index') }}" @click="localStorage.setItem('notifications_read', 'true'); hasUnread = false;" class="text-gray-400 hover:text-gray-600 transition-colors relative block">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span x-cloak x-show="hasUnread" class="absolute -top-1.5 -right-1.5 w-4 h-4 bg-red-500 text-white text-[10px] font-bold rounded-full border-2 border-white flex items-center justify-center">2</span>
                </a>
                <a href="{{ route('profile.edit') }}" class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700 overflow-hidden border border-gray-200 cursor-pointer block hover:ring-2 hover:ring-blue-300 transition-all">
                    @if(Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                    @else
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    @endif
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#f8fafc] p-8">
            @isset($slot)
                {{ $slot }}
            @else
                @yield('content')
            @endisset
        </main>
    </div>

</body>
</html>
