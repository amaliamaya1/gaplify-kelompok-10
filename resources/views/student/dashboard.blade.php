<x-app-layout>
    <x-slot name="header">
        Dashboard Siswa
    </x-slot>

    <div class="max-w-6xl mx-auto pb-10">
        
        <!-- Greeting -->
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-1">Halo, {{ explode(' ', Auth::user()->name)[0] }}!</h2>
            <p class="text-gray-500 font-medium">Selamat datang kembali. Yuk lanjutkan perjalanan belajar TKJ-mu hari ini.</p>
        </div>

        @if($attempts->isEmpty())
        <!-- EMPTY STATE -->
        
        <!-- Big Test CTA -->
        <div class="bg-[#2A54C7] rounded-[1.5rem] shadow-lg p-8 relative overflow-hidden mb-8">
            <!-- decorative circles -->
            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-48 h-48 bg-white opacity-10 rounded-full blur-2xl"></div>
            <div class="absolute bottom-0 right-32 -mb-10 w-24 h-24 bg-white opacity-10 rounded-full blur-xl"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <div class="inline-flex items-center space-x-2 text-white/70 text-[11px] font-semibold uppercase tracking-wider mb-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>Test Diagnostik Tersedia</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">Tes Diagnostik TKJ - Sesi Baru</h3>
                    <div class="flex items-center text-blue-100 text-sm space-x-6 font-medium">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            5-10 soal per topik
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Estimasi 8-15 menit
                        </div>
                    </div>
                </div>
                <div class="mt-6 md:mt-0">
                    <a href="{{ route('student.test.index') }}" class="inline-flex items-center bg-white text-[#2563EB] hover:bg-gray-50 font-bold py-3.5 px-6 rounded-xl shadow transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Pilih Topik & Mulai
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Empty illustration -->
        <div class="bg-white rounded-[1.5rem] p-12 shadow-sm border border-gray-100 text-center">
            <div class="w-24 h-24 mx-auto bg-gray-50 rounded-full flex items-center justify-center mb-4">
                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Riwayat Tes</h3>
            <p class="text-gray-500 max-w-md mx-auto">Anda belum mengerjakan tes diagnostik. Kerjakan tes diagnostik untuk mengetahui kemampuan TKJ Anda dan mendapatkan rekomendasi materi belajar.</p>
        </div>

        @else
        <!-- POPULATED STATE -->
        
        <!-- Stats Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col justify-center relative overflow-hidden">
                <div class="flex items-center mb-2">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <div>
                        <span class="text-sm font-medium text-gray-500">Skor tes terakhir</span>
                        <div class="text-4xl font-extrabold text-gray-900">{{ $latestAttempt->score ?? '0' }}</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col justify-center relative overflow-hidden">
                <div class="flex items-center mb-2">
                    <div class="w-12 h-12 bg-green-50 text-green-500 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <span class="text-sm font-medium text-gray-500">Topik dikuasai</span>
                        <div class="text-4xl font-extrabold text-gray-900">{{ $dikuasai }}</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col justify-center relative overflow-hidden">
                <div class="flex items-center mb-2">
                    <div class="w-12 h-12 bg-yellow-50 text-yellow-500 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <div>
                        <span class="text-sm font-medium text-gray-500">Perlu ditingkatkan</span>
                        <div class="text-4xl font-extrabold text-gray-900">{{ $perluDitingkatkan }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Big Test CTA -->
        <div class="bg-[#2A54C7] rounded-[1.5rem] shadow-lg p-8 relative overflow-hidden mb-8">
            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-48 h-48 bg-white opacity-10 rounded-full blur-2xl"></div>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <div class="inline-flex items-center space-x-2 text-white/70 text-[11px] font-semibold uppercase tracking-wider mb-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>Test Diagnostik Tersedia</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">Tes Diagnostik TKJ - Sesi Baru</h3>
                    <div class="flex items-center text-blue-100 text-sm space-x-6 font-medium">
                        <div class="flex items-center"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>5-10 soal per topik</div>
                        <div class="flex items-center"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Estimasi 8-15 menit</div>
                    </div>
                </div>
                <div class="mt-6 md:mt-0">
                    <a href="{{ route('student.test.index') }}" class="inline-flex items-center bg-white text-[#2563EB] hover:bg-gray-50 font-bold py-3.5 px-6 rounded-xl shadow transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Pilih Topik & Mulai
                    </a>
                </div>
            </div>
        </div>

        <!-- Progres Per Topik -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-8 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    <h3 class="text-lg font-bold text-gray-900">Progres Per Topik</h3>
                </div>
                <a href="{{ route('student.test.index') }}" class="text-sm font-bold text-white bg-[#2563EB] hover:bg-blue-700 py-1.5 px-4 rounded-lg transition-colors flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Tes Ulang
                </a>
            </div>
            <div class="p-6 space-y-5">
                @foreach($topicProgress as $item)
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <span class="text-sm font-semibold text-gray-700">{{ $item['topic']->title }}</span>
                        <span class="text-sm font-bold {{ $item['percentage'] >= 70 ? 'text-green-600' : ($item['percentage'] >= 50 ? 'text-yellow-600' : 'text-red-600') }}">{{ $item['percentage'] }}%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-3">
                        <div class="h-3 rounded-full {{ $item['percentage'] >= 70 ? 'bg-green-500' : ($item['percentage'] >= 50 ? 'bg-yellow-500' : 'bg-red-500') }}" style="width: {{ $item['percentage'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Rekomendasi Materi -->
        @if($recommendedMaterials->isNotEmpty())
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-8 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <h3 class="text-lg font-bold text-gray-900">Rekomendasi Materi Untukmu</h3>
                </div>
                <a href="{{ route('student.recommendations.index') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    Lihat Semua
                </a>
            </div>
            <div class="p-6 space-y-4">
                @foreach($recommendedMaterials as $index => $material)
                @php
                    // Alternating colors based on index for the mockup look
                    $colorSet = [
                        ['bg' => 'bg-red-50', 'border' => 'border-red-200', 'iconBg' => 'bg-red-500', 'btn' => 'bg-red-500 hover:bg-red-600', 'badge' => 'Prioritas tinggi', 'text' => 'text-red-500'],
                        ['bg' => 'bg-yellow-50', 'border' => 'border-yellow-200', 'iconBg' => 'bg-yellow-500', 'btn' => 'bg-yellow-500 hover:bg-yellow-600', 'badge' => 'Perlu Perhatian', 'text' => 'text-yellow-600'],
                        ['bg' => 'bg-blue-50', 'border' => 'border-blue-200', 'iconBg' => 'bg-blue-500', 'btn' => 'bg-blue-500 hover:bg-blue-600', 'badge' => 'Disarankan', 'text' => 'text-blue-500']
                    ];
                    $colors = $colorSet[$index % 3];
                @endphp
                <div class="{{ $colors['bg'] }} {{ $colors['border'] }} border rounded-2xl p-5 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 {{ $colors['iconBg'] }} rounded-xl flex items-center justify-center text-white mr-4 shrink-0 shadow-sm">
                            <span class="font-bold text-xl">#</span>
                        </div>
                        <div>
                            <h4 class="text-md font-bold text-gray-900 mb-0.5">{{ $material->title }}</h4>
                            <p class="text-sm text-gray-500 mb-2 truncate max-w-[300px] sm:max-w-md">{{ $material->description }}</p>
                            <div class="flex items-center text-xs font-medium space-x-3">
                                <span class="{{ $colors['text'] }} flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $colors['badge'] }}
                                </span>
                                <span class="text-gray-400 flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    30 mnt
                                </span>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('student.recommendations.show', $material->id) }}" class="{{ $colors['btn'] }} text-white font-bold py-2 px-6 rounded-lg text-sm shadow-sm transition-colors whitespace-nowrap">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        Pelajari
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- Riwayat Tes Diagnostik -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <h3 class="text-lg font-bold text-gray-900">Riwayat Tes Diagnostik</h3>
                </div>
                <a href="{{ route('student.test.index') }}" class="text-sm font-bold text-white bg-[#2563EB] hover:bg-blue-700 py-1.5 px-4 rounded-lg transition-colors flex items-center">
                    + Tes Baru
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100 font-bold">
                        <tr>
                            <th scope="col" class="px-6 py-4">Tanggal</th>
                            <th scope="col" class="px-6 py-4">Topik</th>
                            <th scope="col" class="px-6 py-4">Soal</th>
                            <th scope="col" class="px-6 py-4 text-center">Skor</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attempts as $attempt)
                        @php
                            $dateStr = $attempt->completed_at ? $attempt->completed_at->format('d M Y') : $attempt->created_at->format('d M Y');
                            // In a real app you might have varying topics, assuming "Semua Topik" for now
                            $topicName = "Semua Topik";
                            $soalCount = $attempt->testAnswers ? $attempt->testAnswers->count() : 10;
                            
                            $score = $attempt->score ?? 0;
                            if($score >= 70) {
                                $scoreColor = "text-green-600";
                                $statusBadge = "bg-green-100 text-green-700";
                                $statusText = "Dikuasai";
                            } elseif($score >= 60) {
                                $scoreColor = "text-yellow-600";
                                $statusBadge = "bg-yellow-100 text-yellow-700";
                                $statusText = "Cukup";
                            } else {
                                $scoreColor = "text-red-500";
                                $statusBadge = "bg-red-100 text-red-600";
                                $statusText = "Perlu ditingkatkan";
                            }
                        @endphp
                        <tr class="bg-white border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $dateStr }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $topicName }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $soalCount }} Soal</td>
                            <td class="px-6 py-4 font-bold {{ $scoreColor }} text-center">{{ $score }}</td>
                            <td class="px-6 py-4">
                                <span class="{{ $statusBadge }} text-xs font-bold px-2.5 py-1 rounded-full whitespace-nowrap">{{ $statusText }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @endif

    </div>
</x-app-layout>
