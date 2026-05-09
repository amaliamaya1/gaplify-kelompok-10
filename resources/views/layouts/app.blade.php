<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gaplify') - Platform Diagnostik Pembelajaran TKJ</title>
    <meta name="description" content="Gaplify - Platform Diagnostik dan Rekomendasi Pembelajaran TKJ untuk siswa SMK.">

    <!-- Fonts: Poppins + Inter + Nunito Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&family=Nunito+Sans:wght@400;500&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --color-primary:   #2563EB;
            --color-navy:      #0F172A;
            --color-sky:       #E0F2FE;
            --color-cyan:      #06B6D4;
            --color-success:   #22C55E;
            --color-warning:   #F59E0B;
            --color-danger:    #EF4444;
            --color-bg:        #F8FAFC;
            --color-card:      #FFFFFF;
            --color-border:    #E2E8F0;
            --color-text-sec:  #64748B;
        }
        body  { font-family: 'Inter', 'Nunito Sans', sans-serif; background-color: #F8FAFC; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Poppins', 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased text-[#0F172A]">
    @yield('content')
</body>
</html>
