<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center w-full">
            <a href="{{ route('student.recommendations.index') }}" class="flex items-center gap-2 text-[#64748B] hover:text-[#0F172A] transition-colors mr-3">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <span class="font-bold text-[#0F172A] text-[16px]">{{ $material->title }}</span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Video / Hero Area --}}
            <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm overflow-hidden">
                @if($material->video_url)
                    <div class="relative w-full bg-[#0F172A]" style="padding-top: 56.25%;">
                        <iframe
                            src="{{ $material->video_url }}?rel=0"
                            class="absolute inset-0 w-full h-full"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                @else
                    <div class="h-52 bg-gradient-to-br from-[#1E3A8A] to-[#3B82F6] flex flex-col items-center justify-center text-center px-8">
                        <svg class="w-14 h-14 text-white/30 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        <h2 class="text-2xl font-extrabold text-white">{{ $material->title }}</h2>
                        <p class="text-white/60 text-sm mt-2">Materi Teks</p>
                    </div>
                @endif

                {{-- Material Info --}}
                <div class="p-6 border-b border-[#E2E8F0]">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <p class="text-[11px] font-bold text-[#2563EB] uppercase tracking-widest mb-1">{{ $material->topic->title ?? 'Topik' }}</p>
                            <h1 class="text-2xl font-bold text-[#0F172A]">{{ $material->title }}</h1>
                            @if($material->description)
                                <p class="text-[#64748B] text-sm mt-2">{{ $material->description }}</p>
                            @endif
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <span class="flex items-center gap-1.5 text-xs text-[#64748B] bg-[#F8FAFC] border border-[#E2E8F0] px-3 py-1.5 rounded-xl">
                                <svg class="w-3.5 h-3.5 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Materi
                            </span>
                            <span class="text-xs font-semibold px-3 py-1.5 bg-[#DBEAFE] text-[#1D4ED8] rounded-xl">Belajar</span>
                        </div>
                    </div>
                </div>

                {{-- Content Body --}}
                <div class="p-6">
                    <h3 class="text-base font-bold text-[#0F172A] mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Isi Materi
                    </h3>
                    <div class="prose prose-sm max-w-none text-[#334155] leading-relaxed text-sm">
                        {!! \Illuminate\Support\Str::markdown($material->content) !!}
                    </div>
                </div>
            </div>

            {{-- Footer Actions --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pb-8">
                <a href="{{ route('student.recommendations.index') }}" class="flex items-center gap-2 px-5 py-2.5 border border-[#E2E8F0] text-[#475569] hover:bg-white font-semibold text-sm rounded-xl transition-colors bg-white">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Daftar Materi
                </a>
                <a href="{{ route('student.test.index') }}" class="flex items-center gap-2 px-6 py-2.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold text-sm rounded-xl transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Ambil Tes Diagnostik Baru
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
