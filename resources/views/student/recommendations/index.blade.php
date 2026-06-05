<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center w-full">
            <span class="font-bold text-[#0F172A] text-[16px]">{{ __('Rekomendasi Materi') }}</span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @php
            $cardStyles = [
                0 => ['icon' => 'hash',     'bg' => 'bg-[#EFF6FF]', 'color' => 'text-[#2563EB]', 'btn' => 'bg-[#2563EB] hover:bg-[#1D4ED8]', 'level' => 'Dasar',    'duration' => 60,  'levelColor' => 'bg-[#DBEAFE] text-[#1D4ED8]'],
                1 => ['icon' => 'tools',    'bg' => 'bg-[#FFF7ED]', 'color' => 'text-[#EA580C]', 'btn' => 'bg-[#EA580C] hover:bg-[#C2410C]', 'level' => 'Dasar',    'duration' => 90,  'levelColor' => 'bg-[#DBEAFE] text-[#1D4ED8]'],
                2 => ['icon' => 'cog',      'bg' => 'bg-[#F0FDF4]', 'color' => 'text-[#16A34A]', 'btn' => 'bg-[#16A34A] hover:bg-[#15803D]', 'level' => 'Menengah', 'duration' => 85,  'levelColor' => 'bg-[#FEF3C7] text-[#D97706]'],
                3 => ['icon' => 'layers',   'bg' => 'bg-[#EFF6FF]', 'color' => 'text-[#3B82F6]', 'btn' => 'bg-[#93C5FD] hover:bg-[#60A5FA]', 'level' => 'Dasar',    'duration' => 45,  'levelColor' => 'bg-[#DBEAFE] text-[#1D4ED8]'],
                4 => ['icon' => 'wifi',     'bg' => 'bg-[#FFF1F2]', 'color' => 'text-[#EF4444]', 'btn' => 'bg-[#EF4444] hover:bg-[#DC2626]', 'level' => 'Menengah', 'duration' => 45,  'levelColor' => 'bg-[#FEF3C7] text-[#D97706]'],
                5 => ['icon' => 'shield',   'bg' => 'bg-[#FAF5FF]', 'color' => 'text-[#7C3AED]', 'btn' => 'bg-[#7C3AED] hover:bg-[#6D28D9]', 'level' => 'Lanjutan', 'duration' => 70,  'levelColor' => 'bg-[#EDE9FE] text-[#6D28D9]'],
            ];

            $svgPaths = [
                'hash'     => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>',
                'tools'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>',
                'cog'      => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>',
                'layers'   => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>',
                'wifi'     => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12.55a11 11 0 0114.08 0M1.42 9a16 16 0 0121.16 0M8.53 16.11a6 6 0 016.95 0M12 20h.01"/>',
                'shield'   => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
            ];
        @endphp

        {{-- Page Title --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-[#0F172A]">Rekomendasi Materi TKJ</h2>
            <p class="text-[#64748B] text-sm mt-1">Materi dipilihkan berdasarkan hasil analisis tes diagnostikmu. Prioritaskan yang berlabel <span class="font-bold text-[#EF4444]">Prioritas Tinggi</span></p>
        </div>

        {{-- Skill Gap Banner --}}
        @if($skillGapTopics->count() > 0)
        <div class="flex items-center justify-between bg-[#FFF1F2] border border-[#FECACA] rounded-2xl px-5 py-4 mb-6">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-[#FEE2E2] rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-[#EF4444]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-[#EF4444] text-sm">Skill Gap Terdeteksi</p>
                    <p class="text-[#64748B] text-xs mt-0.5">
                        Berdasarkan tes terakhir:
                        @foreach($skillGapTopics as $i => $t)
                            <strong class="text-[#0F172A]">{{ $t->title }}</strong>@if($i < $skillGapTopics->count()-1) dan @endif
                        @endforeach
                        memerlukan perhatian segera.
                    </p>
                </div>
            </div>
            @if($attempt)
            <a href="{{ route('student.analysis.result', $attempt->id) }}" class="shrink-0 ml-4 flex items-center gap-2 px-4 py-2 bg-[#EF4444] hover:bg-[#DC2626] text-white text-xs font-bold rounded-xl transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Lihat Analisis
            </a>
            @endif
        </div>
        @endif

        {{-- Filter Tabs (pure JS, no Alpine) --}}
        <div class="flex flex-wrap gap-2 mb-6">
            <button onclick="filterCards('semua', this)" id="tab-semua"
                class="filter-tab active-tab flex items-center gap-1.5 px-4 py-2 rounded-xl text-sm font-semibold transition-all bg-[#2563EB] text-white shadow-sm">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                Semua Materi
            </button>
            <button onclick="filterCards('dasar', this)" id="tab-dasar"
                class="filter-tab flex items-center gap-1.5 px-4 py-2 rounded-xl text-sm font-semibold transition-all bg-white text-[#475569] border border-[#E2E8F0] hover:bg-[#F8FAFC]">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/></svg>
                Dasar
            </button>
            <button onclick="filterCards('menengah', this)" id="tab-menengah"
                class="filter-tab flex items-center gap-1.5 px-4 py-2 rounded-xl text-sm font-semibold transition-all bg-white text-[#475569] border border-[#E2E8F0] hover:bg-[#F8FAFC]">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2"/></svg>
                Menengah
            </button>
            <button onclick="filterCards('lanjutan', this)" id="tab-lanjutan"
                class="filter-tab flex items-center gap-1.5 px-4 py-2 rounded-xl text-sm font-semibold transition-all bg-white text-[#475569] border border-[#E2E8F0] hover:bg-[#F8FAFC]">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                Lanjutan
            </button>
            <button onclick="filterCards('prioritas', this)" id="tab-prioritas"
                class="filter-tab flex items-center gap-1.5 px-4 py-2 rounded-xl text-sm font-semibold transition-all bg-white text-[#475569] border border-[#E2E8F0] hover:bg-[#F8FAFC]">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                Prioritas Tinggi
            </button>
        </div>

        {{-- Material Cards --}}
        @if($allMaterials->isEmpty())
            <div class="flex flex-col items-center justify-center py-20 text-center">
                <div class="w-20 h-20 bg-[#F0FDF4] rounded-full flex items-center justify-center mb-5">
                    <svg class="w-10 h-10 text-[#22C55E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#0F172A] mb-2">Semua Materi Telah Dikuasai!</h3>
                <p class="text-[#64748B] text-sm">Kamu sudah menguasai semua topik. Tidak ada materi yang perlu dipelajari ulang saat ini.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="cards-grid">
                @foreach($allMaterials->values() as $idx => $material)
                @php
                    $ci = $idx % 6;
                    $card = $cardStyles[$ci];
                    $iconKey = $card['icon'];
                    $iconPath = $svgPaths[$iconKey] ?? $svgPaths['hash'];
                    $isPriority = $material->is_priority;
                    $levelLower = strtolower($card['level']);
                @endphp
                <div class="material-card bg-white rounded-2xl border border-[#E2E8F0] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 flex flex-col overflow-hidden"
                     data-level="{{ $levelLower }}"
                     data-priority="{{ $isPriority ? '1' : '0' }}">

                    <div class="p-5 flex-1">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-11 h-11 {{ $card['bg'] }} rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 {{ $card['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    {!! $iconPath !!}
                                </svg>
                            </div>
                            @if($isPriority)
                                <span class="text-[10px] font-bold bg-[#FEE2E2] text-[#EF4444] px-2.5 py-1 rounded-full">Prioritas</span>
                            @endif
                        </div>

                        <h4 class="font-bold text-[#0F172A] text-[15px] mb-2 leading-snug">{{ $material->title }}</h4>
                        <p class="text-[#64748B] text-xs leading-relaxed line-clamp-2 mb-4">{{ Str::limit($material->description, 90) }}</p>

                        <div class="flex items-center gap-3 text-[11px] text-[#64748B]">
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                Materi
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $card['duration'] }} mnt
                            </span>
                            <span class="px-2 py-0.5 rounded-md font-semibold text-[10px] {{ $card['levelColor'] }}">{{ $card['level'] }}</span>
                        </div>
                    </div>

                    <div class="px-5 pb-5">
                        <button onclick="openModal({{ $idx }})"
                            class="w-full flex items-center justify-center gap-2 py-2.5 {{ $card['btn'] }} text-white text-sm font-semibold rounded-xl transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Mulai Belajar
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        {{-- Bottom CTA --}}
        <div class="flex justify-center mt-10 pb-8">
            <a href="{{ route('student.test.index') }}" class="flex items-center gap-2 px-8 py-3 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold rounded-xl shadow-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Ambil Tes Diagnostik Baru
            </a>
        </div>

        </div>
    </div>

    {{-- ===== MODAL (pure HTML + JS, no Alpine) ===== --}}
    <div id="material-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-[#0F172A]/70 backdrop-blur-sm" onclick="closeModal()"></div>

        {{-- Panel --}}
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto z-10 transition-all duration-300 scale-95 opacity-0" id="modal-panel">

            {{-- Header --}}
            <div class="flex items-center justify-between p-5 border-b border-[#E2E8F0]">
                <div>
                    <p class="text-[11px] font-bold text-[#2563EB] uppercase tracking-wide mb-0.5" id="modal-topic"></p>
                    <h3 class="text-lg font-bold text-[#0F172A]" id="modal-title"></h3>
                </div>
                <button onclick="closeModal()" class="w-9 h-9 flex items-center justify-center bg-[#F1F5F9] hover:bg-[#E2E8F0] rounded-xl transition-colors">
                    <svg class="w-5 h-5 text-[#475569]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Video --}}
            <div id="modal-video-wrap" class="bg-[#0F172A]">
                <div class="relative w-full" style="padding-top:56.25%">
                    <iframe id="modal-iframe" src="" class="absolute inset-0 w-full h-full" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            {{-- No Video placeholder --}}
            <div id="modal-no-video" class="hidden h-40 bg-gradient-to-br from-[#1E3A8A] to-[#3B82F6] flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-12 h-12 text-white/40 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <p class="text-white/70 text-sm font-medium">Baca materi di bawah</p>
                </div>
            </div>

            {{-- Body --}}
            <div class="p-6">
                <div class="flex items-center gap-3 mb-5">
                    <span class="flex items-center gap-1.5 text-xs text-[#64748B]">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span id="modal-duration"></span>
                    </span>
                    <span class="text-xs font-semibold px-2.5 py-1 bg-[#DBEAFE] text-[#1D4ED8] rounded-full" id="modal-level"></span>
                    <span class="hidden text-xs font-bold px-2.5 py-1 bg-[#FEE2E2] text-[#EF4444] rounded-full" id="modal-priority-badge">Prioritas Tinggi</span>
                </div>
                <p class="text-[#475569] text-sm leading-relaxed mb-5" id="modal-desc"></p>
                <hr class="border-[#E2E8F0] mb-5">
                <h4 class="text-sm font-bold text-[#0F172A] mb-3">📖 Isi Materi</h4>
                <div class="text-[#334155] leading-relaxed text-sm whitespace-pre-line" id="modal-content"></div>
            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-between p-5 border-t border-[#E2E8F0] bg-[#F8FAFC]">
                <button onclick="closeModal()" class="flex items-center gap-2 px-4 py-2.5 border border-[#E2E8F0] text-[#475569] hover:bg-white font-semibold text-sm rounded-xl transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali
                </button>
                <a href="#" id="modal-full-link" class="flex items-center gap-2 px-4 py-2.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold text-sm rounded-xl transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Buka Halaman Penuh
                </a>
            </div>
        </div>
    </div>

    {{-- ===== JavaScript ===== --}}
    @php
        $materialsForJs = $allMaterials->values()->map(function($m, $i) use ($cardStyles) {
            $ci = $i % 6;
            return [
                'id'          => $m->id,
                'title'       => $m->title,
                'topic'       => $m->topic->title ?? '',
                'description' => $m->description ?? '',
                'content'     => $m->content ?? '',
                'video_url'   => $m->video_url ?? '',
                'level'       => $cardStyles[$ci]['level'],
                'duration'    => $cardStyles[$ci]['duration'],
                'isPriority'  => (bool) $m->is_priority,
            ];
        })->values();
    @endphp
    <script>
        // Materials data from PHP
        var materialsData = @json($materialsForJs);

        // ---- Filter ----
        function filterCards(tab, btn) {
            // Update tab styles
            document.querySelectorAll('.filter-tab').forEach(function(b) {
                b.classList.remove('bg-[#2563EB]','bg-[#EF4444]','text-white','shadow-sm');
                b.classList.add('bg-white','text-[#475569]','border','border-[#E2E8F0]');
            });
            if (tab === 'prioritas') {
                btn.classList.add('bg-[#EF4444]','text-white','shadow-sm');
                btn.classList.remove('bg-white','text-[#475569]','border','border-[#E2E8F0]');
            } else {
                btn.classList.add('bg-[#2563EB]','text-white','shadow-sm');
                btn.classList.remove('bg-white','text-[#475569]','border','border-[#E2E8F0]');
            }

            // Show/hide cards
            document.querySelectorAll('.material-card').forEach(function(card) {
                var level    = card.getAttribute('data-level');
                var priority = card.getAttribute('data-priority');
                var show = false;
                if (tab === 'semua')     show = true;
                if (tab === level)       show = true;
                if (tab === 'prioritas' && priority === '1') show = true;
                card.style.display = show ? 'flex' : 'none';
                card.style.flexDirection = show ? 'column' : '';
            });
        }

        // ---- Modal ----
        function openModal(index) {
            var m = materialsData[index];
            if (!m) return;

            document.getElementById('modal-topic').textContent   = m.topic;
            document.getElementById('modal-title').textContent   = m.title;
            document.getElementById('modal-desc').textContent    = m.description;
            document.getElementById('modal-content').textContent = m.content;
            document.getElementById('modal-duration').textContent = m.duration + ' menit';
            document.getElementById('modal-level').textContent   = m.level;
            document.getElementById('modal-full-link').href      = '/student/recommendations/' + m.id;

            // Priority badge
            var badge = document.getElementById('modal-priority-badge');
            badge.classList.toggle('hidden', !m.isPriority);

            // Video
            var videoWrap = document.getElementById('modal-video-wrap');
            var noVideo   = document.getElementById('modal-no-video');
            var iframe    = document.getElementById('modal-iframe');

            if (m.video_url) {
                iframe.src = m.video_url + '?autoplay=1&rel=0';
                videoWrap.classList.remove('hidden');
                noVideo.classList.add('hidden');
            } else {
                iframe.src = '';
                videoWrap.classList.add('hidden');
                noVideo.classList.remove('hidden');
            }

            // Show modal
            var modal = document.getElementById('material-modal');
            var panel = document.getElementById('modal-panel');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            requestAnimationFrame(function() {
                panel.classList.remove('scale-95','opacity-0');
                panel.classList.add('scale-100','opacity-100');
            });
        }

        function closeModal() {
            var modal = document.getElementById('material-modal');
            var panel = document.getElementById('modal-panel');
            var iframe = document.getElementById('modal-iframe');

            panel.classList.add('scale-95','opacity-0');
            panel.classList.remove('scale-100','opacity-100');
            iframe.src = '';

            setTimeout(function() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }, 200);
        }

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });
    </script>

</x-app-layout>
