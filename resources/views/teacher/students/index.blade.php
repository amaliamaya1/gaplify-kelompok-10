<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center w-full">
            <span class="font-bold text-[#0F172A] text-[16px]">Daftar Siswa</span>
        </div>
    </x-slot>

    <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm overflow-hidden">

        {{-- Header & Filters --}}
        <div class="px-6 pt-6 pb-4 border-b border-[#E2E8F0]">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-9 h-9 bg-[#EFF6FF] rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-base font-bold text-[#0F172A]">Daftar Siswa</h3>
            </div>

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-2.5">
                {{-- Filter Kelas --}}
                <div class="relative">
                    <select id="filterKelas"
                        class="form-select appearance-none bg-white border border-[#E2E8F0] text-[#475569] text-sm rounded-xl pl-3 pr-9 py-2.5 outline-none cursor-pointer focus:border-[#2563EB] focus:ring-2 focus:ring-[#2563EB]/20 transition-all min-w-[130px]">
                        <option value="">Semua Kelas</option>
                        <option value="X TKJ 1">X TKJ 1</option>
                        <option value="X TKJ 2">X TKJ 2</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                        <svg class="w-4 h-4 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>

                {{-- Filter Status --}}
                <div class="relative">
                    <select id="filterStatus"
                        class="form-select appearance-none bg-white border border-[#E2E8F0] text-[#475569] text-sm rounded-xl pl-3 pr-9 py-2.5 outline-none cursor-pointer focus:border-[#2563EB] focus:ring-2 focus:ring-[#2563EB]/20 transition-all min-w-[150px]">
                        <option value="">Semua Status</option>
                        <option value="Sangat Baik">Sangat Baik</option>
                        <option value="Cukup">Cukup</option>
                        <option value="Perlu Pendampingan">Perlu Pendampingan</option>
                        <option value="Belum Tes">Belum Tes</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                        <svg class="w-4 h-4 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>

                {{-- Search --}}
                <div class="relative flex-1 sm:flex-none sm:w-60">
                    <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input id="searchInput" type="text"
                        class="w-full bg-white border border-[#E2E8F0] text-[#0F172A] text-sm rounded-xl pl-9 pr-4 py-2.5 outline-none focus:border-[#2563EB] focus:ring-2 focus:ring-[#2563EB]/20 transition-all placeholder-[#94A3B8]"
                        placeholder="Cari Pengguna...">
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-[#2563EB] bg-[#EFF6FF] font-semibold border-b border-[#E2E8F0]">
                    <tr>
                        <th class="px-6 py-4 w-12">#</th>
                        <th class="px-6 py-4">Nama Siswa</th>
                        <th class="px-6 py-4">Kelas</th>
                        <th class="px-6 py-4 text-center">Skor Terakhir</th>
                        <th class="px-6 py-4 min-w-[200px]">Topik Lemah</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody id="studentsTableBody">
                    @forelse($studentsData as $index => $student)
                        <tr class="student-row border-b border-[#E2E8F0] hover:bg-[#F8FAFC] transition-colors"
                            data-name="{{ strtolower($student['name']) }}"
                            data-class="{{ $student['class'] }}"
                            data-status="{{ $student['status'] }}">

                            {{-- No --}}
                            <td class="px-6 py-4 text-[#64748B] font-medium row-number">{{ $index + 1 }}</td>

                            {{-- Nama --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-[#2563EB] text-white flex items-center justify-center font-bold text-xs shrink-0">
                                        {{ strtoupper(substr($student['name'], 0, 2)) }}
                                    </div>
                                    <span class="font-semibold text-[#0F172A] whitespace-nowrap">{{ $student['name'] }}</span>
                                </div>
                            </td>

                            {{-- Kelas --}}
                            <td class="px-6 py-4 text-[#475569] whitespace-nowrap">{{ $student['class'] }}</td>

                            {{-- Skor --}}
                            <td class="px-6 py-4 text-center font-bold">
                                @if($student['score'] === '-')
                                    <span class="text-[#CBD5E1]">—</span>
                                @else
                                    @php
                                        $sc = $student['score'] >= 85 ? 'text-[#10B981]' : ($student['score'] >= 70 ? 'text-[#D97706]' : 'text-[#EF4444]');
                                    @endphp
                                    <span class="{{ $sc }}">{{ $student['score'] }}</span>
                                @endif
                            </td>

                            {{-- Topik Lemah --}}
                            <td class="px-6 py-4">
                                @if(empty($student['weak_topics']))
                                    <span class="inline-flex items-center justify-center px-3 py-1 text-[10px] font-bold text-[#64748B] bg-[#F1F5F9] rounded-full">—</span>
                                @else
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach($student['weak_topics'] as $topic)
                                            <span class="px-2.5 py-1 text-[10px] font-bold bg-[#FEE2E2] text-[#EF4444] rounded-full whitespace-nowrap">
                                                {{ Str::limit($topic, 15) }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4 text-center">
                                @if($student['status'] === 'Sangat Baik')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 text-[10px] font-bold text-[#10B981] bg-[#D1FAE5] rounded-full border border-[#A7F3D0]">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        Sangat Baik
                                    </span>
                                @elseif($student['status'] === 'Cukup')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 text-[10px] font-bold text-[#D97706] bg-[#FEF3C7] rounded-full border border-[#FDE68A]">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                        Cukup
                                    </span>
                                @elseif($student['status'] === 'Perlu Pendampingan')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 text-[10px] font-bold text-[#EF4444] bg-[#FEE2E2] rounded-full border border-[#FECACA]">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        Perlu Pendampingan
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 text-[10px] font-bold text-[#64748B] bg-[#F1F5F9] rounded-full border border-[#E2E8F0]">
                                        Belum Tes
                                    </span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('teacher.students.detail', $student['id']) }}"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-[#2563EB] bg-white border border-[#2563EB] hover:bg-[#EFF6FF] rounded-lg transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Detail
                                    </a>

                                    @if($student['status'] !== 'Belum Tes')
                                        <a href="{{ route('teacher.students.analysis', $student['id']) }}"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-white bg-[#2563EB] hover:bg-[#1D4ED8] rounded-lg transition-colors shadow-sm">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                            Analisis
                                        </a>
                                    @else
                                        <button disabled
                                            title="Siswa belum mengerjakan tes"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-[#CBD5E1] bg-[#F8FAFC] border border-[#E2E8F0] rounded-lg cursor-not-allowed">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                            Analisis
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-[#94A3B8] text-sm">
                                Belum ada data siswa terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- No results --}}
            <div id="emptyFilterResult" class="hidden py-12 text-center">
                <div class="w-14 h-14 mx-auto bg-[#F1F5F9] rounded-full flex items-center justify-center mb-3">
                    <svg class="w-7 h-7 text-[#CBD5E1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <p class="font-semibold text-[#475569]">Tidak ada hasil ditemukan</p>
                <p class="text-xs text-[#94A3B8] mt-1">Coba ubah filter atau kata kunci pencarian.</p>
            </div>
        </div>

        {{-- Footer --}}
        <div class="px-6 py-4 border-t border-[#E2E8F0] flex flex-col sm:flex-row items-center justify-between gap-3 bg-[#FAFAFA]">
            <span class="text-xs text-[#64748B]" id="countLabel">
                Menampilkan <span id="visibleCount">{{ count($studentsData) }}</span> dari {{ count($studentsData) }} Pengguna
            </span>
            <nav class="inline-flex -space-x-px rounded-lg overflow-hidden shadow-sm border border-[#E2E8F0]">
                <button class="px-3 py-2 text-[#CBD5E1] bg-white hover:bg-[#F8FAFC] transition-colors" disabled>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button class="px-4 py-2 text-xs font-bold text-white bg-[#2563EB]">1</button>
                <button class="px-3 py-2 text-[#CBD5E1] bg-white hover:bg-[#F8FAFC] transition-colors" disabled>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </nav>
        </div>
    </div>

    <script>
    (function () {
        const total = {{ count($studentsData) }};
        const $search  = document.getElementById('searchInput');
        const $kelas   = document.getElementById('filterKelas');
        const $status  = document.getElementById('filterStatus');
        const $tbody   = document.getElementById('studentsTableBody');
        const $empty   = document.getElementById('emptyFilterResult');
        const $count   = document.getElementById('visibleCount');

        function filter() {
            const q      = $search.value.toLowerCase().trim();
            const kelas  = $kelas.value;
            const status = $status.value;

            const rows = $tbody.querySelectorAll('tr.student-row');
            let visible = 0;

            rows.forEach(function (row) {
                const matchName   = !q      || row.dataset.name.includes(q);
                const matchKelas  = !kelas  || row.dataset.class === kelas;
                const matchStatus = !status || row.dataset.status === status;

                if (matchName && matchKelas && matchStatus) {
                    row.style.display = '';
                    row.querySelector('.row-number').textContent = ++visible;
                } else {
                    row.style.display = 'none';
                }
            });

            $count.textContent = visible;
            $empty.classList.toggle('hidden', visible > 0);
        }

        $search.addEventListener('input', filter);
        $kelas.addEventListener('change', filter);
        $status.addEventListener('change', filter);
    })();
    </script>
</x-app-layout>
