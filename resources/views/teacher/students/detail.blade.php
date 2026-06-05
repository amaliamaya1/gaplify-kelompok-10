<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('teacher.students') }}" class="text-[#64748B] hover:text-[#0F172A] transition-colors p-2 bg-white rounded-xl border border-[#E2E8F0] shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <span class="font-bold text-[#0F172A] text-[16px]">Detail Siswa</span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Student Info Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-[#E2E8F0] p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden">
                <!-- Background decoration -->
                <div class="absolute right-0 top-0 w-64 h-64 bg-gradient-to-br from-[#EFF6FF] to-transparent opacity-50 -translate-y-1/2 translate-x-1/2 rounded-full pointer-events-none"></div>
                
                <div class="flex items-center gap-5 relative z-10">
                    <div class="w-[72px] h-[72px] rounded-2xl bg-[#EFF6FF] text-[#2563EB] flex items-center justify-center text-2xl font-black shrink-0 border border-[#BFDBFE] shadow-sm">
                        {{ strtoupper(substr($student->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-[#0F172A]">{{ $student->name }}</h3>
                        <p class="text-[#64748B] text-sm">{{ $student->email }}</p>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="px-2.5 py-1 text-[10px] font-bold rounded-lg bg-[#EFF6FF] text-[#2563EB] uppercase tracking-wider">Siswa TKJ</span>
                            <span class="px-2.5 py-1 text-[10px] font-bold rounded-lg bg-[#F8FAFC] text-[#475569] uppercase tracking-wider">
                                ID: #{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="bg-[#F8FAFC] p-4 rounded-xl border border-[#E2E8F0] min-w-[180px] relative z-10">
                    <p class="text-xs font-semibold text-[#64748B] uppercase tracking-wider mb-1">Total Sesi Tes</p>
                    <div class="flex items-baseline gap-2">
                        <p class="text-3xl font-black text-[#2563EB]">{{ $attempts->count() }}</p>
                        <span class="text-sm font-medium text-[#94A3B8]">Tes Dikerjakan</span>
                    </div>
                </div>
            </div>

            {{-- Test History --}}
            <div class="bg-white rounded-2xl shadow-sm border border-[#E2E8F0] overflow-hidden">
                <div class="p-6 border-b border-[#E2E8F0] flex items-center justify-between bg-[#F8FAFC]">
                    <h4 class="text-[15px] font-bold text-[#0F172A] flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Riwayat Pengerjaan Tes Diagnostik
                    </h4>
                </div>

                @if($attempts->isEmpty())
                <div class="p-12 text-center">
                    <div class="w-20 h-20 mx-auto bg-[#F1F5F9] rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <p class="font-semibold text-[#0F172A]">Belum Ada Riwayat Tes</p>
                    <p class="text-sm text-[#64748B] mt-1">Siswa ini belum mengerjakan tes diagnostik satupun.</p>
                </div>
                @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white border-b border-[#E2E8F0]">
                                <th class="px-6 py-4 text-xs font-bold text-[#64748B] uppercase tracking-wider w-16">#</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#64748B] uppercase tracking-wider">Tanggal & Waktu</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#64748B] uppercase tracking-wider">Skor Akhir</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#64748B] uppercase tracking-wider">Status Pemahaman</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#F1F5F9] bg-white">
                            @foreach($attempts as $i => $attempt)
                            <tr class="hover:bg-[#F8FAFC] transition-colors group">
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-[#94A3B8]">{{ $i + 1 }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        <span class="text-[13px] font-semibold text-[#334155]">
                                            {{ $attempt->completed_at ? $attempt->completed_at->format('d M Y') : '-' }}
                                        </span>
                                        <span class="text-[11px] text-[#94A3B8]">
                                            {{ $attempt->completed_at ? $attempt->completed_at->format('H:i') : '' }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="text-lg font-black {{ $attempt->score >= 70 ? 'text-[#16A34A]' : ($attempt->score >= 50 ? 'text-[#D97706]' : 'text-[#DC2626]') }}">
                                            {{ $attempt->score ?? '-' }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($attempt->score !== null)
                                    <span class="px-3 py-1 text-[11px] font-bold rounded-lg 
                                        {{ $attempt->score >= 70 ? 'bg-[#DCFCE7] text-[#16A34A]' : ($attempt->score >= 50 ? 'bg-[#FEF3C7] text-[#D97706]' : 'bg-[#FEE2E2] text-[#EF4444]') }}">
                                        {{ $attempt->score >= 70 ? 'Dikuasai' : ($attempt->score >= 50 ? 'Cukup' : 'Perlu Ditingkatkan') }}
                                    </span>
                                    @else
                                    <span class="px-3 py-1 text-[11px] font-bold rounded-lg bg-[#F1F5F9] text-[#64748B]">
                                        Belum selesai
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
