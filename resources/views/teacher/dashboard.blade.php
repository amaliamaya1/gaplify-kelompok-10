<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center w-full">
            <span class="font-bold text-[#0F172A] text-[16px]">Dashboard Guru</span>
        </div>
    </x-slot>

    {{-- CDN Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Welcome Text --}}
            <div class="mb-8">
                <h2 class="text-[28px] font-extrabold text-[#0F172A] tracking-tight">
                    Selamat datang, {{ Auth::user()->name }}!
                </h2>
                <p class="text-[#64748B] text-[15px] mt-1">
                    Pantau perkembangan siswa kelas TKJ secara real-time dan identifikasi siapa yang butuh bantuan.
                </p>
            </div>

            {{-- 4 Summary Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
                
                {{-- Card 1: Total Siswa --}}
                <div class="bg-white rounded-2xl border border-[#E2E8F0] p-6 flex items-center shadow-sm">
                    <div class="w-14 h-14 bg-[#EFF6FF] rounded-2xl flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <div class="ml-5">
                        <p class="text-[13px] font-medium text-[#64748B]">Total Siswa</p>
                        <h3 class="text-3xl font-extrabold text-[#0F172A] mt-0.5">{{ $studentsCount }}</h3>
                    </div>
                </div>

                {{-- Card 2: Rata-rata Skor --}}
                <div class="bg-white rounded-2xl border border-[#E2E8F0] p-6 flex items-center shadow-sm">
                    <div class="w-14 h-14 bg-[#F0FDF4] rounded-2xl flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7 text-[#16A34A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <div class="ml-5">
                        <p class="text-[13px] font-medium text-[#64748B]">Rata-rata Skor</p>
                        <h3 class="text-3xl font-extrabold text-[#0F172A] mt-0.5">{{ number_format($averageScore, 0) }}</h3>
                    </div>
                </div>

                {{-- Card 3: Perlu Pendampingan --}}
                <div class="bg-white rounded-2xl border border-[#E2E8F0] p-6 flex items-center shadow-sm">
                    <div class="w-14 h-14 bg-[#FFFBEB] rounded-2xl flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7 text-[#D97706]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <div class="ml-5">
                        <p class="text-[13px] font-medium text-[#64748B]">Perlu Pendampingan</p>
                        <h3 class="text-3xl font-extrabold text-[#0F172A] mt-0.5">{{ $needsAssistance }}</h3>
                    </div>
                </div>

                {{-- Card 4: Sudah Tes --}}
                <div class="bg-white rounded-2xl border border-[#E2E8F0] p-6 flex items-center shadow-sm">
                    <div class="w-14 h-14 bg-[#ECFEFF] rounded-2xl flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7 text-[#0891B2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="ml-5">
                        <p class="text-[13px] font-medium text-[#64748B]">Sudah Tes</p>
                        <h3 class="text-3xl font-extrabold text-[#0F172A] mt-0.5">{{ $testedStudents }}</h3>
                    </div>
                </div>

            </div>

            @if($testedStudents > 0)
            {{-- 2 Charts Row --}}
            <div id="monitoring-kelas" class="grid grid-cols-1 lg:grid-cols-2 gap-6 scroll-mt-6">
                
                {{-- Chart 1: Perkembangan Rata-rata Kelas --}}
                <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm p-6 flex flex-col">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-[15px] font-bold text-[#0F172A] flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            Perkembangan Rata-rata Kelas
                        </h3>
                        <span class="px-3 py-1 bg-[#EFF6FF] text-[#2563EB] text-xs font-semibold rounded-lg">5 Sesi Tes</span>
                    </div>
                    
                    <div class="relative flex-1 w-full min-h-[250px]">
                        <canvas id="averageChart"></canvas>
                    </div>
                </div>

                {{-- Chart 2: Skill Gap Terbanyak --}}
                <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm p-6 flex flex-col">
                    <div class="mb-6">
                        <h3 class="text-[15px] font-bold text-[#0F172A] flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#EF4444]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            Skill Gap Terbanyak di Kelas
                        </h3>
                    </div>

                    <div class="space-y-5 flex-1">
                        @if(empty($skillGaps))
                            <div class="flex flex-col items-center justify-center h-full text-center">
                                <p class="text-[#64748B] text-sm">Belum ada data skill gap yang cukup. Arahkan siswa untuk mengambil tes.</p>
                            </div>
                        @else
                            @foreach($skillGaps as $index => $gap)
                                @if($index < 6) {{-- Limit to top 6 to fit card nicely --}}
                                @php
                                    $percentage = $gap['wrong_percentage'];
                                    $color = 'bg-[#10B981]'; // Green if < 40%
                                    if ($percentage >= 60) $color = 'bg-[#EF4444]'; // Red if >= 60%
                                    else if ($percentage >= 40) $color = 'bg-[#F59E0B]'; // Orange if >= 40%
                                @endphp
                                <div>
                                    <div class="flex items-center justify-between mb-1.5 text-[13px] font-medium">
                                        <span class="text-[#334155]">{{ $gap['topic'] }}</span>
                                        <span class="{{ str_replace('bg-', 'text-', $color) }}">{{ $percentage }}% siswa kesulitan</span>
                                    </div>
                                    <div class="w-full bg-[#F1F5F9] rounded-full h-2.5 overflow-hidden">
                                        <div class="{{ $color }} h-full rounded-full transition-all duration-1000 ease-out" style="width: {{ $percentage }}%"></div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
            @else
            {{-- Empty State --}}
            <div id="monitoring-kelas" class="bg-white rounded-[1.5rem] p-12 shadow-sm border border-[#E2E8F0] text-center mt-2">
                <div class="w-24 h-24 mx-auto bg-[#EFF6FF] rounded-full flex items-center justify-center mb-5">
                    <svg class="w-12 h-12 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#0F172A] mb-2">Belum Ada Data Analisis</h3>
                <p class="text-[#64748B] max-w-md mx-auto">Grafik perkembangan rata-rata kelas dan skill gap terbanyak akan muncul di sini secara otomatis setelah ada siswa yang menyelesaikan tes diagnostik.</p>
            </div>
            @endif

        </div>
    </div>

    {{-- Initialize Chart.js --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('averageChart');
            if (ctx) {
                const chartData = @json($classAverages);
                
                new Chart(ctx, {
                    type: 'bar',
                    data: chartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    usePointStyle: false,
                                    boxWidth: 24,
                                    boxHeight: 12,
                                    padding: 20,
                                    font: { family: "'Inter', sans-serif", size: 12, weight: '600' },
                                    color: '#334155'
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100,
                                grid: {
                                    color: '#F1F5F9',
                                    drawBorder: false,
                                },
                                ticks: {
                                    stepSize: 10,
                                    color: '#94A3B8',
                                    font: { family: "'Inter', sans-serif", size: 11 },
                                    callback: function(value) { return value + '%' }
                                },
                                border: { display: false }
                            },
                            x: {
                                grid: {
                                    display: false,
                                    drawBorder: false,
                                },
                                ticks: {
                                    color: '#64748B',
                                    font: { family: "'Inter', sans-serif", size: 12 }
                                },
                                border: { display: false }
                            }
                        },
                        barPercentage: 0.8,
                        categoryPercentage: 0.65
                    }
                });
            }
        });
    </script>
</x-app-layout>
