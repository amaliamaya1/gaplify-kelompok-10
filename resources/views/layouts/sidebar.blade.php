<aside class="w-[260px] bg-[#0F172A] text-white flex flex-col h-full border-r border-[#1E293B] shrink-0 transition-all duration-300">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="h-[72px] flex items-center px-6 border-b border-[#1E293B] shrink-0 hover:bg-[#1E293B] transition-colors cursor-pointer block group">
        <div class="flex items-center h-full w-full">
            <div class="flex items-center gap-3 bg-white p-1.5 rounded-xl transition-transform group-hover:scale-105">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8">
            </div>
            <div class="ml-3 flex flex-col">
                <span class="text-[20px] leading-tight font-extrabold font-['Poppins'] tracking-wide text-white group-hover:text-blue-400 transition-colors">Gaplify</span>
                <span class="text-[10px] text-gray-400 font-medium tracking-wide">Platform TKJ</span>
            </div>
        </div>
    </a>

    <!-- Navigation -->
    <div class="flex-1 overflow-y-auto py-6 px-4 space-y-8">
        
        @if(Auth::user()->role === 'student')
        <!-- MENU SISWA -->
        <div>
            <p class="px-3 text-[11px] font-bold text-gray-500 uppercase tracking-widest mb-3">Menu Siswa</p>
            <nav class="space-y-1">
                <a href="{{ route('student.dashboard') }}" class="flex items-center px-3 py-3 rounded-xl {{ request()->routeIs('student.dashboard') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-[#1E293B] hover:text-gray-200' }} transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('student.dashboard') ? 'text-white' : 'text-gray-500 group-hover:text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span class="text-[14px] font-medium">Dashboard</span>
                </a>
                
                <a href="{{ route('student.test.index') }}" class="flex items-center px-3 py-3 rounded-xl {{ request()->routeIs('student.test.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-[#1E293B] hover:text-gray-200' }} transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('student.test.*') ? 'text-white' : 'text-gray-500 group-hover:text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span class="text-[14px] font-medium">Tes Diagnostik</span>
                </a>
                
                <a href="{{ route('student.analysis.index') }}" class="flex items-center px-3 py-3 rounded-xl {{ request()->routeIs('student.analysis.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-[#1E293B] hover:text-gray-200' }} transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('student.analysis.*') ? 'text-white' : 'text-gray-500 group-hover:text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span class="text-[14px] font-medium">Hasil Analisis</span>
                </a>

                <!-- Rekomendasi Materi -->
                <a href="{{ route('student.recommendations.index') }}" class="flex items-center px-3 py-3 rounded-xl {{ request()->routeIs('student.recommendations.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-[#1E293B] hover:text-gray-200' }} transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('student.recommendations.*') ? 'text-white' : 'text-gray-500 group-hover:text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <span class="text-[14px] font-medium">Rekomendasi Materi</span>
                </a>
            </nav>
        </div>
        @elseif(Auth::user()->role === 'teacher')
        <div>
            <p class="px-3 text-[11px] font-bold text-gray-500 uppercase tracking-widest mb-3">Menu Guru</p>
            <nav class="space-y-1">
                <a href="{{ route('teacher.dashboard') }}" class="flex items-center px-3 py-3 rounded-xl {{ request()->routeIs('teacher.dashboard') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-[#1E293B] hover:text-gray-200' }} transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('teacher.dashboard') ? 'text-white' : 'text-gray-500 group-hover:text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span class="text-[14px] font-medium">Dashboard</span>
                </a>
                <a href="{{ route('teacher.students') }}" class="flex items-center px-3 py-3 rounded-xl {{ request()->routeIs('teacher.students*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-[#1E293B] hover:text-gray-200' }} transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('teacher.students*') ? 'text-white' : 'text-gray-500 group-hover:text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span class="text-[14px] font-medium">Daftar Siswa</span>
                </a>
                <a href="{{ route('teacher.dashboard') }}#monitoring-kelas" class="flex items-center px-3 py-3 rounded-xl text-gray-400 hover:bg-[#1E293B] hover:text-gray-200 transition-all group">
                    <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    <span class="text-[14px] font-medium">Monitoring Kelas</span>
                </a>
            </nav>
        </div>
        @else
        <div>
            <p class="px-3 text-[11px] font-bold text-gray-500 uppercase tracking-widest mb-3">Menu Admin</p>
            <nav class="space-y-1">
                @php 
                    $currentTab = request()->query('tab'); 
                    $isDashboard = request()->routeIs('admin.dashboard') && empty($currentTab);
                @endphp
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-3 rounded-xl {{ $isDashboard ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-[#1E293B] hover:text-gray-200' }} transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ $isDashboard ? 'text-white' : 'text-gray-500 group-hover:text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span class="text-[14px] font-medium">Dashboard Admin</span>
                </a>
                <a href="{{ route('admin.dashboard', ['tab' => 'pengguna']) }}" class="flex items-center px-3 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') && $currentTab === 'pengguna' ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-[#1E293B] hover:text-gray-200' }} transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') && $currentTab === 'pengguna' ? 'text-white' : 'text-gray-500 group-hover:text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span class="text-[14px] font-medium">Kelola Pengguna</span>
                </a>
                <a href="{{ route('admin.dashboard', ['tab' => 'soal']) }}" class="flex items-center px-3 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') && $currentTab === 'soal' ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-[#1E293B] hover:text-gray-200' }} transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') && $currentTab === 'soal' ? 'text-white' : 'text-gray-500 group-hover:text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-[14px] font-medium">Kelola Soal</span>
                </a>
                <a href="{{ route('admin.dashboard', ['tab' => 'materi']) }}" class="flex items-center px-3 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') && $currentTab === 'materi' ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-[#1E293B] hover:text-gray-200' }} transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') && $currentTab === 'materi' ? 'text-white' : 'text-gray-500 group-hover:text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <span class="text-[14px] font-medium">Kelola Materi</span>
                </a>
            </nav>
        </div>

        <div>
            <p class="px-3 text-[11px] font-bold text-gray-500 uppercase tracking-widest mb-3 mt-4">Lainnya</p>
            <nav class="space-y-1">
                <a href="{{ route('home') }}" class="flex items-center px-3 py-3 rounded-xl text-gray-400 hover:bg-[#1E293B] hover:text-gray-200 transition-all group">
                    <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                    <span class="text-[14px] font-medium">Beranda</span>
                </a>
            </nav>
        </div>
        @endif
        
        <!-- AKUN -->
        <div>
            <p class="px-3 text-[11px] font-bold text-gray-500 uppercase tracking-widest mb-3 mt-4">Akun</p>
            <nav class="space-y-1">
                <a href="{{ route('profile.edit') }}" class="flex items-center px-3 py-3 rounded-xl {{ request()->routeIs('profile.edit') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-[#1E293B] hover:text-gray-200' }} transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('profile.edit') ? 'text-white' : 'text-gray-500 group-hover:text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span class="text-[14px] font-medium">Profil Saya</span>
                </a>
            </nav>
        </div>
    </div>
    
    <!-- User Footer -->
    <div class="p-4 border-t border-[#1E293B] bg-[#0B1221]">
        <div class="flex items-center justify-between">
            <div class="flex items-center overflow-hidden">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700 shrink-0 border-2 border-[#1E293B] overflow-hidden">
                    @if(Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                    @else
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    @endif
                </div>
                <div class="ml-3 truncate">
                    <p class="text-[13px] font-bold text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[11px] text-gray-400 truncate">{{ Auth::user()->role === 'student' ? 'Siswa TKJ' : ucfirst(Auth::user()->role) }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="shrink-0 ml-2">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-white p-2 rounded-lg hover:bg-gray-800 transition-colors" title="Logout">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                </button>
            </form>
        </div>
    </div>
</aside>
