<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center w-full">
            <span class="font-bold text-[#0F172A] text-[16px]">Panel Admin</span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Page Title --}}
            <div>
                <h2 class="text-2xl font-bold text-[#0F172A]">Panel Administrasi Gaplify</h2>
                <p class="text-[#64748B] text-sm mt-1">Kelola seluruh data pengguna, soal diagnostik, dan materi pembelajaran platform</p>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                {{-- Total Siswa --}}
                <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm p-5 flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#EFF6FF] rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-[#64748B]">Total Siswa</p>
                        <p class="text-2xl font-black text-[#0F172A]">{{ $stats['students'] }}</p>
                        <p class="text-[10px] text-[#94A3B8]">aktif terdaftar</p>
                    </div>
                </div>

                {{-- Total Guru --}}
                <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm p-5 flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#ECFEFF] rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-[#06B6D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-[#64748B]">Total Guru</p>
                        <p class="text-2xl font-black text-[#0F172A]">{{ $stats['teachers'] }}</p>
                        <p class="text-[10px] text-[#94A3B8]">di 6 sekolah</p>
                    </div>
                </div>

                {{-- Soal Diagnostik --}}
                <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm p-5 flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#FFFBEB] rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-[#D97706]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-[#64748B]">Soal Diagnostik</p>
                        <p class="text-2xl font-black text-[#0F172A]">{{ $stats['questions'] }}</p>
                        <p class="text-[10px] text-[#94A3B8]">{{ $stats['topics'] }} topik TKJ</p>
                    </div>
                </div>

                {{-- Materi Tersedia --}}
                <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm p-5 flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#F0FDF4] rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-[#16A34A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-[#64748B]">Materi Tersedia</p>
                        <p class="text-2xl font-black text-[#0F172A]">{{ $stats['materials'] }}</p>
                        <p class="text-[10px] text-[#94A3B8]">modul aktif</p>
                    </div>
                </div>
            </div>

            {{-- Tab Section --}}
            <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm overflow-hidden">

                {{-- Tab Navigation --}}
                <div class="border-b border-[#E2E8F0] px-6 pt-5 flex items-end gap-1">
                        <a href="{{ route('admin.dashboard', ['tab' => 'pengguna']) }}"
                           class="flex items-center gap-2 px-5 py-3 text-sm font-semibold rounded-t-xl transition-colors border-b-2
                           {{ $tab === 'pengguna' ? 'border-[#2563EB] text-[#2563EB] bg-[#EFF6FF]' : 'border-transparent text-[#64748B] hover:text-[#0F172A] hover:bg-[#F8FAFC]' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            Kelola Pengguna
                        </a>
                        <a href="{{ route('admin.dashboard', ['tab' => 'soal']) }}"
                           class="flex items-center gap-2 px-5 py-3 text-sm font-semibold rounded-t-xl transition-colors border-b-2
                           {{ $tab === 'soal' ? 'border-[#2563EB] text-[#2563EB] bg-[#EFF6FF]' : 'border-transparent text-[#64748B] hover:text-[#0F172A] hover:bg-[#F8FAFC]' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Kelola Soal
                        </a>
                        <a href="{{ route('admin.dashboard', ['tab' => 'materi']) }}"
                           class="flex items-center gap-2 px-5 py-3 text-sm font-semibold rounded-t-xl transition-colors border-b-2
                           {{ $tab === 'materi' ? 'border-[#2563EB] text-[#2563EB] bg-[#EFF6FF]' : 'border-transparent text-[#64748B] hover:text-[#0F172A] hover:bg-[#F8FAFC]' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            Kelola Materi
                        </a>
                </div>

                {{-- Success/Error Alerts --}}
                @if(session('success'))
                <div class="mx-6 mt-4 px-4 py-3 bg-[#F0FDF4] border border-[#86EFAC] rounded-xl text-[#16A34A] text-sm font-medium flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
                @endif

                {{-- ======================== TAB: PENGGUNA ======================== --}}
                @if($tab === 'pengguna')
                {{-- Toolbar --}}
                <div class="px-6 py-4 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" placeholder="Cari Pengguna..." class="pl-9 pr-4 py-2 border border-[#E2E8F0] rounded-xl text-sm focus:outline-none focus:border-[#2563EB] focus:ring-1 focus:ring-[#2563EB] w-56 sm:w-64 text-[#0F172A]">
                        </div>
                        <select class="px-4 py-2 border border-[#E2E8F0] rounded-xl text-sm focus:outline-none focus:border-[#2563EB] focus:ring-1 focus:ring-[#2563EB] text-[#64748B] bg-white appearance-none pr-8 relative" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%2394A3B8%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 0.7rem top 50%; background-size: 0.65rem auto;">
                            <option value="">Semua Role</option>
                            <option value="student">Siswa</option>
                            <option value="teacher">Guru</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="flex items-center gap-2 px-4 py-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-sm font-semibold rounded-xl transition-colors shadow-sm shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Pengguna
                    </a>
                </div>

                <div class="px-6 pb-6">
                    <div class="rounded-xl border border-[#EFF6FF] overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-[#EFF6FF]">
                                    <tr>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap w-10">#</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap">Nama</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap">Email / NIS</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap text-center">Role</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap">Sekolah</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap">Status</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#F1F5F9] bg-white">
                                    @forelse($users as $i => $user)
                                    <tr class="hover:bg-[#F8FAFC] transition-colors">
                                        <td class="px-6 py-4 text-sm font-semibold text-[#94A3B8]">{{ $users->firstItem() + $i }}</td>
                                        <td class="px-6 py-4">
                                            <span class="text-[13px] font-bold text-[#0F172A]">{{ $user->name }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-[13px] text-[#64748B]">{{ $user->email }}</td>
                                        <td class="px-6 py-4 text-center">
                                            @php
                                                $roleColor = match($user->role) {
                                                    'student' => 'bg-[#EFF6FF] text-[#2563EB]',
                                                    'teacher' => 'bg-[#ECFEFF] text-[#0891B2]', // Cyan
                                                    'admin'   => 'bg-[#FEF3C7] text-[#D97706]',
                                                    default   => 'bg-[#F1F5F9] text-[#64748B]',
                                                };
                                                $roleLabel = match($user->role) {
                                                    'student' => 'Siswa',
                                                    'teacher' => 'Guru',
                                                    'admin'   => 'Admin',
                                                    default   => ucfirst($user->role),
                                                };
                                                $roleIcon = match($user->role) {
                                                    'student' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>',
                                                    'teacher' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                                                    'admin'   => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                                                    default   => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>',
                                                };
                                            @endphp
                                            <span class="px-2.5 py-1 text-[10px] font-bold rounded-lg {{ $roleColor }} inline-flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $roleIcon !!}</svg>
                                                {{ $roleLabel }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-[13px] text-[#64748B]">
                                            {{ $user->role === 'admin' ? '-' : ($user->school ?? 'Belum diisi') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-2.5 py-1 text-[10px] font-bold rounded-lg bg-[#F0FDF4] text-[#16A34A] inline-flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                Aktif
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('admin.users.edit', $user) }}" class="flex items-center gap-1.5 px-3 py-1.5 border border-[#2563EB] text-[#2563EB] hover:bg-[#EFF6FF] rounded-lg transition-colors text-xs font-semibold" title="Edit">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Hapus pengguna ini?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="p-1.5 bg-[#EF4444] hover:bg-[#DC2626] text-white rounded-lg transition-colors" title="Hapus">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="7" class="px-6 py-12 text-center text-[#94A3B8] text-sm">Belum ada pengguna terdaftar.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- Pagination --}}
                <div class="px-6 py-4 border-t border-[#E2E8F0] flex items-center justify-between">
                    <p class="text-xs text-[#64748B]">Menampilkan {{ $users->firstItem() }}–{{ $users->lastItem() }} dari {{ $users->total() }} pengguna</p>
                    <div class="flex items-center gap-1">
                        @if($users->onFirstPage())
                            <span class="px-3 py-1.5 rounded-lg bg-[#F1F5F9] text-[#94A3B8] text-sm cursor-not-allowed">‹</span>
                        @else
                            <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1.5 rounded-lg bg-white border border-[#E2E8F0] text-[#475569] text-sm hover:bg-[#F8FAFC]">‹</a>
                        @endif
                        @foreach($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                            @if($page == $users->currentPage())
                                <span class="px-3 py-1.5 rounded-lg bg-[#2563EB] text-white text-sm font-bold">{{ $page }}</span>
                            @elseif(abs($page - $users->currentPage()) <= 1 || $page == 1 || $page == $users->lastPage())
                                <a href="{{ $url }}" class="px-3 py-1.5 rounded-lg bg-white border border-[#E2E8F0] text-[#475569] text-sm hover:bg-[#F8FAFC]">{{ $page }}</a>
                            @elseif(abs($page - $users->currentPage()) == 2)
                                <span class="px-1 text-[#94A3B8] text-sm">...</span>
                            @endif
                        @endforeach
                        @if($users->hasMorePages())
                            <a href="{{ $users->nextPageUrl() }}" class="px-3 py-1.5 rounded-lg bg-white border border-[#E2E8F0] text-[#475569] text-sm hover:bg-[#F8FAFC]">›</a>
                        @else
                            <span class="px-3 py-1.5 rounded-lg bg-[#F1F5F9] text-[#94A3B8] text-sm cursor-not-allowed">›</span>
                        @endif
                    </div>
                </div>

                {{-- ======================== TAB: SOAL ======================== --}}
                @elseif($tab === 'soal')
                {{-- Toolbar --}}
                <div class="px-6 py-4 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <select class="px-4 py-2 border border-[#E2E8F0] rounded-xl text-sm focus:outline-none focus:border-[#2563EB] focus:ring-1 focus:ring-[#2563EB] text-[#64748B] bg-white appearance-none pr-8 relative" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%2394A3B8%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 0.7rem top 50%; background-size: 0.65rem auto;">
                            <option value="">Semua Topik</option>
                            @foreach($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                            @endforeach
                        </select>
                        <select class="px-4 py-2 border border-[#E2E8F0] rounded-xl text-sm focus:outline-none focus:border-[#2563EB] focus:ring-1 focus:ring-[#2563EB] text-[#64748B] bg-white appearance-none pr-8 relative" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%2394A3B8%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 0.7rem top 50%; background-size: 0.65rem auto;">
                            <option value="">Semua Tingkat</option>
                            <option value="mudah">Mudah</option>
                            <option value="sedang">Sedang</option>
                            <option value="sulit">Sulit</option>
                        </select>
                    </div>
                    <a href="{{ route('admin.questions.create') }}" class="flex items-center gap-2 px-4 py-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-sm font-semibold rounded-xl transition-colors shadow-sm shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Soal
                    </a>
                </div>

                <div class="px-6 pb-6">
                    <div class="rounded-xl border border-[#EFF6FF] overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-[#EFF6FF]">
                                    <tr>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap w-10">#</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap">Teks Soal</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap text-center">Topik</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap text-center">Tingkat</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap">Jawaban</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#F1F5F9] bg-white">
                                    @forelse($questions as $i => $question)
                                    @php
                                        $answerMap = [
                                            'A' => $question->option_a,
                                            'B' => $question->option_b,
                                            'C' => $question->option_c,
                                            'D' => $question->option_d,
                                        ];
                                        $levels = [
                                            ['label' => 'Mudah', 'color' => 'bg-[#F0FDF4] text-[#16A34A]'],
                                            ['label' => 'Sedang', 'color' => 'bg-[#FFFBEB] text-[#D97706]'],
                                            ['label' => 'Sulit', 'color' => 'bg-[#FEF2F2] text-[#EF4444]'],
                                        ];
                                        $level = $levels[$question->id % 3];
                                    @endphp
                                    <tr class="hover:bg-[#F8FAFC] transition-colors">
                                        <td class="px-6 py-4 text-sm font-semibold text-[#94A3B8]">{{ $questions->firstItem() + $i }}</td>
                                        <td class="px-6 py-4 max-w-sm">
                                            <p class="text-[13px] font-medium text-[#64748B] line-clamp-1">{{ $question->question }}</p>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if($question->topic)
                                            <span class="px-3 py-1 text-[10px] font-bold rounded-full bg-[#E0F2FE] text-[#0284C7] whitespace-nowrap inline-block">{{ $question->topic->title }}</span>
                                            @else
                                            <span class="text-[#94A3B8] text-xs">-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="px-3 py-1 text-[10px] font-bold rounded-full {{ $level['color'] }} inline-block">{{ $level['label'] }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-[13px] font-bold text-[#0F172A]">{{ $question->correct_answer }}. </span>
                                            <span class="text-[13px] font-bold text-[#0F172A]">{{ Str::limit($answerMap[$question->correct_answer] ?? '-', 20) }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('admin.questions.edit', $question) }}" class="p-1.5 border border-[#2563EB] text-[#2563EB] hover:bg-[#EFF6FF] rounded-lg transition-colors" title="Edit">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                                </a>
                                                <form action="{{ route('admin.questions.destroy', $question) }}" method="POST" onsubmit="return confirm('Hapus soal ini?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="p-1.5 bg-[#EF4444] hover:bg-[#DC2626] text-white rounded-lg transition-colors" title="Hapus">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="6" class="px-6 py-12 text-center text-[#94A3B8] text-sm">Belum ada soal. Tambahkan soal pertama!</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- Pagination --}}
                <div class="px-6 py-4 border-t border-[#E2E8F0] flex items-center justify-between">
                    <p class="text-xs text-[#64748B]">Menampilkan {{ $questions->firstItem() }}–{{ $questions->lastItem() }} dari {{ $questions->total() }} soal</p>
                    <div class="flex items-center gap-1">
                        @if($questions->onFirstPage())
                            <span class="px-3 py-1.5 rounded-lg bg-[#F1F5F9] text-[#94A3B8] text-sm cursor-not-allowed">‹</span>
                        @else
                            <a href="{{ $questions->previousPageUrl() }}" class="px-3 py-1.5 rounded-lg bg-white border border-[#E2E8F0] text-[#475569] text-sm hover:bg-[#F8FAFC]">‹</a>
                        @endif
                        @foreach($questions->getUrlRange(1, $questions->lastPage()) as $page => $url)
                            @if($page == $questions->currentPage())
                                <span class="px-3 py-1.5 rounded-lg bg-[#2563EB] text-white text-sm font-bold">{{ $page }}</span>
                            @elseif(abs($page - $questions->currentPage()) <= 1 || $page == 1 || $page == $questions->lastPage())
                                <a href="{{ $url }}" class="px-3 py-1.5 rounded-lg bg-white border border-[#E2E8F0] text-[#475569] text-sm hover:bg-[#F8FAFC]">{{ $page }}</a>
                            @elseif(abs($page - $questions->currentPage()) == 2)
                                <span class="px-1 text-[#94A3B8] text-sm">...</span>
                            @endif
                        @endforeach
                        @if($questions->hasMorePages())
                            <a href="{{ $questions->nextPageUrl() }}" class="px-3 py-1.5 rounded-lg bg-white border border-[#E2E8F0] text-[#475569] text-sm hover:bg-[#F8FAFC]">›</a>
                        @else
                            <span class="px-3 py-1.5 rounded-lg bg-[#F1F5F9] text-[#94A3B8] text-sm cursor-not-allowed">›</span>
                        @endif
                    </div>
                </div>

                {{-- ======================== TAB: MATERI ======================== --}}
                @elseif($tab === 'materi')
                {{-- Toolbar --}}
                <div class="px-6 py-4 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <select class="px-4 py-2 border border-[#E2E8F0] rounded-xl text-sm focus:outline-none focus:border-[#2563EB] focus:ring-1 focus:ring-[#2563EB] text-[#64748B] bg-white appearance-none pr-8 relative" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%2394A3B8%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 0.7rem top 50%; background-size: 0.65rem auto;">
                            <option value="">Semua Topik</option>
                            @foreach($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{ route('admin.materials.create') }}" class="flex items-center gap-2 px-4 py-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-sm font-semibold rounded-xl transition-colors shadow-sm shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Materi
                    </a>
                </div>

                <div class="px-6 pb-6">
                    <div class="rounded-xl border border-[#EFF6FF] overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-[#EFF6FF]">
                                    <tr>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap w-10">#</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap">Judul Materi</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap text-center">Topik</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap text-center">Tingkat</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap text-center">Estimasi</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap text-center">Status</th>
                                        <th class="px-6 py-4 text-xs font-bold text-[#2563EB] whitespace-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#F1F5F9] bg-white">
                                    @forelse($materials as $i => $material)
                                    @php
                                        // Dummy data for design
                                        $levels = [
                                            ['label' => 'Dasar', 'color' => 'bg-[#F0FDF4] text-[#16A34A]'],
                                            ['label' => 'Menengah', 'color' => 'bg-[#FFFBEB] text-[#D97706]'],
                                            ['label' => 'Lanjutan', 'color' => 'bg-[#F3E8FF] text-[#9333EA]'],
                                        ];
                                        $level = $levels[$material->id % 3];
                                        $estimations = ['45 mnt', '60 mnt', '90 mnt', '120 mnt'];
                                        $estimation = $estimations[$material->id % 4];
                                        $isDraft = ($material->id % 4 === 0);
                                    @endphp
                                    <tr class="hover:bg-[#F8FAFC] transition-colors">
                                        <td class="px-6 py-4 text-sm font-semibold text-[#94A3B8]">{{ $materials->firstItem() + $i }}</td>
                                        <td class="px-6 py-4 max-w-sm">
                                            <p class="text-[13px] font-bold text-[#0F172A]">{{ $material->title }}</p>
                                            @if($material->description)
                                            <p class="text-[11px] text-[#64748B] mt-0.5">{{ Str::limit($material->description, 50) }}</p>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if($material->topic)
                                            <span class="px-3 py-1 text-[10px] font-bold rounded-full bg-[#E0F2FE] text-[#0284C7] whitespace-nowrap inline-block">{{ $material->topic->title }}</span>
                                            @else
                                            <span class="text-[#94A3B8] text-xs">-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="px-3 py-1 text-[10px] font-bold rounded-full {{ $level['color'] }} inline-block">{{ $level['label'] }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-[13px] text-[#0F172A] font-medium text-center">
                                            {{ $estimation }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if($isDraft)
                                            <span class="px-2.5 py-1 text-[10px] font-bold rounded-lg bg-[#FFFBEB] text-[#D97706] inline-flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                Draft
                                            </span>
                                            @else
                                            <span class="px-2.5 py-1 text-[10px] font-bold rounded-lg bg-[#F0FDF4] text-[#16A34A] inline-flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                Aktif
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('admin.materials.edit', $material) }}" class="p-1.5 border border-[#2563EB] text-[#2563EB] hover:bg-[#EFF6FF] rounded-lg transition-colors" title="Edit">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                                </a>
                                                <form action="{{ route('admin.materials.destroy', $material) }}" method="POST" onsubmit="return confirm('Hapus materi ini?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="p-1.5 bg-[#EF4444] hover:bg-[#DC2626] text-white rounded-lg transition-colors" title="Hapus">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="7" class="px-6 py-12 text-center text-[#94A3B8] text-sm">Belum ada materi. Tambahkan materi pertama!</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                {{-- Pagination --}}
                <div class="px-6 py-4 border-t border-[#E2E8F0] flex items-center justify-between">
                    <p class="text-xs text-[#64748B]">Menampilkan {{ $materials->firstItem() }}–{{ $materials->lastItem() }} dari {{ $materials->total() }} materi</p>
                    <div class="flex items-center gap-1">
                        @if($materials->onFirstPage())
                            <span class="px-3 py-1.5 rounded-lg bg-[#F1F5F9] text-[#94A3B8] text-sm cursor-not-allowed">‹</span>
                        @else
                            <a href="{{ $materials->previousPageUrl() }}" class="px-3 py-1.5 rounded-lg bg-white border border-[#E2E8F0] text-[#475569] text-sm hover:bg-[#F8FAFC]">‹</a>
                        @endif
                        @foreach($materials->getUrlRange(1, $materials->lastPage()) as $page => $url)
                            @if($page == $materials->currentPage())
                                <span class="px-3 py-1.5 rounded-lg bg-[#2563EB] text-white text-sm font-bold">{{ $page }}</span>
                            @elseif(abs($page - $materials->currentPage()) <= 1 || $page == 1 || $page == $materials->lastPage())
                                <a href="{{ $url }}" class="px-3 py-1.5 rounded-lg bg-white border border-[#E2E8F0] text-[#475569] text-sm hover:bg-[#F8FAFC]">{{ $page }}</a>
                            @elseif(abs($page - $materials->currentPage()) == 2)
                                <span class="px-1 text-[#94A3B8] text-sm">...</span>
                            @endif
                        @endforeach
                        @if($materials->hasMorePages())
                            <a href="{{ $materials->nextPageUrl() }}" class="px-3 py-1.5 rounded-lg bg-white border border-[#E2E8F0] text-[#475569] text-sm hover:bg-[#F8FAFC]">›</a>
                        @else
                            <span class="px-3 py-1.5 rounded-lg bg-[#F1F5F9] text-[#94A3B8] text-sm cursor-not-allowed">›</span>
                        @endif
                    </div>
                </div>
                @endif

            </div>{{-- end Tab Section --}}

        </div>
    </div>
</x-app-layout>
