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
        <header class="bg-white border-b border-gray-100 h-[72px] flex items-center justify-between px-8 shrink-0 w-full">
            {{ $header ?? 'Ujian' }}
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#EBF5FF] p-8">
            @isset($slot)
                {{ $slot }}
            @else
                @yield('content')
            @endisset
        </main>
    </div>

</body>
</html>
