<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengerjakan Tes - {{ $topic->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #EBF3FF; }
        .option-selected { border-color: #2563EB !important; background-color: #F8FAFC; }
        .option-selected .circle-label { background-color: #2563EB !important; color: white !important; }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white px-6 py-4 flex items-center justify-between border-b border-[#E2E8F0] shadow-sm">
        <h1 class="font-bold text-[#0F172A] text-lg">{{ $topic->title }}</h1>
        <div class="flex items-center gap-3">
            <a href="{{ route('student.test.index') }}" class="px-4 py-2 text-sm font-semibold text-[#64748B] border border-[#E2E8F0] rounded-lg hover:bg-gray-50 flex items-center gap-2 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Ganti Topik
            </a>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-semibold text-[#64748B] border border-[#E2E8F0] rounded-lg hover:bg-gray-50 flex items-center gap-2 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                Keluar
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-1 max-w-4xl w-full mx-auto p-6 md:p-8 flex flex-col">
        
        <!-- Badges -->
        <div class="flex justify-center gap-6 mb-8 text-[12px] font-semibold text-[#64748B]">
            <div class="flex items-center gap-1.5 px-4 py-1.5 bg-white rounded-full shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Pilihan Ganda
            </div>
            <div class="flex items-center gap-1.5 px-4 py-1.5 bg-white rounded-full shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Tanpa Batas Waktu
            </div>
            <div class="flex items-center gap-1.5 px-4 py-1.5 bg-white rounded-full shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Jawab Semua Soal
            </div>
        </div>

        <form action="{{ route('submit-tes', $attempt->id) }}" method="POST" id="test-form" class="flex-1 flex flex-col gap-6">
            @csrf

            <!-- Progress Bar -->
            <div>
                <div class="flex justify-between text-sm font-bold text-[#0F172A] mb-2">
                    <span>Soal <span id="current-question-num">1</span> dari {{ $questions->count() }}</span>
                    <span><span id="current-question-ratio">1</span>/{{ $questions->count() }}</span>
                </div>
                <div class="w-full bg-[#D1D5DB] h-2 rounded-full overflow-hidden">
                    <div id="progress-bar" class="bg-[#06B6D4] h-full transition-all duration-300" style="width: {{ (1 / $questions->count()) * 100 }}%"></div>
                </div>
            </div>

            <!-- Question Card -->
            <div class="bg-white rounded-2xl shadow-sm p-8 flex-1 border border-[#E2E8F0]">
                @foreach($questions as $index => $question)
                <div class="question-container" id="question-{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                    <p class="text-[#64748B] text-xs font-bold tracking-wider uppercase mb-4">SOAL {{ $index + 1 }} - {{ strtoupper($topic->title) }}</p>
                    <h2 class="text-xl font-bold text-[#0F172A] leading-relaxed mb-8">{{ $question->question_text }}</h2>

                    <div class="space-y-4">
                        @php $labels = ['A', 'B', 'C', 'D', 'E']; @endphp
                        @foreach($question->options as $optIndex => $option)
                        <label class="flex items-center p-4 border border-[#E2E8F0] rounded-xl cursor-pointer hover:border-[#2563EB] transition-colors option-label relative">
                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" class="hidden peer" onchange="markAnswered({{ $index }})">
                            <div class="w-8 h-8 rounded-full bg-[#F1F5F9] text-[#64748B] font-bold flex items-center justify-center mr-4 circle-label transition-colors">
                                {{ $labels[$optIndex] ?? '' }}
                            </div>
                            <span class="text-[#0F172A] font-medium flex-1">{{ $option->option_text }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
                @endforeach

                <!-- Card Footer Navigation -->
                <div class="flex items-center justify-between mt-10 pt-6 border-t border-[#E2E8F0]">
                    <button type="button" id="btn-prev" onclick="changeQuestion(-1)" class="px-6 py-2.5 border border-[#E2E8F0] text-[#64748B] font-bold rounded-lg hover:bg-gray-50 flex items-center gap-2 transition-colors opacity-50 cursor-not-allowed" disabled>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        Sebelumnya
                    </button>

                    <button type="button" id="btn-next" onclick="changeQuestion(1)" class="px-6 py-2.5 bg-[#2563EB] text-white font-bold rounded-lg hover:bg-[#1D4ED8] flex items-center gap-2 transition-colors">
                        Selanjutnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                    
                    <button type="button" id="btn-submit" onclick="confirmSubmit()" class="px-6 py-2.5 bg-[#10B981] text-white font-bold rounded-lg hover:bg-[#059669] items-center gap-2 transition-colors hidden">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Submit Jawaban
                    </button>
                </div>
            </div>

            <!-- Bottom Progress Grid -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border border-[#E2E8F0]">
                <div class="flex items-center gap-2 text-[#0F172A] font-bold mb-4">
                    <svg class="w-5 h-5 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Progress Per Topik
                </div>
                
                <div class="flex flex-wrap gap-3">
                    @foreach($questions as $index => $q)
                    <button type="button" id="grid-btn-{{ $index }}" onclick="goToQuestion({{ $index }})" class="w-12 h-12 rounded-lg font-bold text-lg border {{ $index === 0 ? 'border-[#2563EB] text-[#0F172A]' : 'border-[#E2E8F0] text-[#64748B]' }} flex items-center justify-center transition-colors grid-btn hover:border-[#94A3B8]">
                        {{ $index + 1 }}
                    </button>
                    @endforeach
                </div>

                <div class="flex items-center gap-6 mt-6">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-[#2563EB] rounded-sm"></div>
                        <span class="text-xs text-[#64748B] font-medium">Sudah Dijawab</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-white border border-[#D1D5DB] rounded-sm"></div>
                        <span class="text-xs text-[#64748B] font-medium">Belum Dijawab</span>
                    </div>
                </div>
            </div>

        </form>
    </div>

<script>
    let currentQuestionIndex = 0;
    const totalQuestions = {{ $questions->count() }};

    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Reset all labels in this question container
            const container = this.closest('.question-container');
            container.querySelectorAll('.option-label').forEach(label => {
                label.classList.remove('option-selected');
            });
            // Add selected style
            if(this.checked) {
                this.closest('label').classList.add('option-selected');
            }
        });
    });

    function updateUI() {
        document.querySelectorAll('.question-container').forEach(el => el.style.display = 'none');
        document.getElementById('question-' + currentQuestionIndex).style.display = 'block';

        // Update progress texts
        document.getElementById('current-question-num').innerText = currentQuestionIndex + 1;
        document.getElementById('current-question-ratio').innerText = currentQuestionIndex + 1;
        const progressPct = ((currentQuestionIndex + 1) / totalQuestions) * 100;
        document.getElementById('progress-bar').style.width = progressPct + '%';

        // Update Prev Button
        const btnPrev = document.getElementById('btn-prev');
        if (currentQuestionIndex === 0) {
            btnPrev.disabled = true;
            btnPrev.classList.add('opacity-50', 'cursor-not-allowed');
            btnPrev.classList.remove('hover:bg-gray-50');
        } else {
            btnPrev.disabled = false;
            btnPrev.classList.remove('opacity-50', 'cursor-not-allowed');
            btnPrev.classList.add('hover:bg-gray-50');
        }

        // Update Next / Submit Button
        const btnNext = document.getElementById('btn-next');
        const btnSubmit = document.getElementById('btn-submit');
        if (currentQuestionIndex === totalQuestions - 1) {
            btnNext.classList.add('hidden');
            btnSubmit.classList.remove('hidden');
            btnSubmit.classList.add('flex');
        } else {
            btnNext.classList.remove('hidden');
            btnNext.classList.add('flex');
            btnSubmit.classList.add('hidden');
            btnSubmit.classList.remove('flex');
        }

        // Update Grid Buttons
        document.querySelectorAll('.grid-btn').forEach((btn, idx) => {
            // Check if answered
            const isAnswered = btn.getAttribute('data-answered') === 'true';
            
            // Reset classes
            btn.className = "w-12 h-12 rounded-lg font-bold text-lg border flex items-center justify-center transition-colors grid-btn hover:border-[#94A3B8]";
            
            if (idx === currentQuestionIndex) {
                // Active Outline
                btn.classList.add('border-[#2563EB]', 'text-[#0F172A]');
            } else if (isAnswered) {
                // Answered state (blue fill according to screenshot)
                btn.classList.add('bg-[#2563EB]', 'text-white', 'border-[#2563EB]');
            } else {
                // Default
                btn.classList.add('border-[#E2E8F0]', 'text-[#64748B]', 'bg-white');
            }
        });
    }

    function changeQuestion(step) {
        currentQuestionIndex += step;
        updateUI();
    }

    function goToQuestion(index) {
        currentQuestionIndex = index;
        updateUI();
    }

    function markAnswered(index) {
        document.getElementById('grid-btn-' + index).setAttribute('data-answered', 'true');
        updateUI(); 
    }

    function confirmSubmit() {
        if(confirm('Apakah kamu yakin ingin menyelesaikan tes ini? Jawaban tidak dapat diubah setelah disubmit.')) {
            document.getElementById('test-form').submit();
        }
    }
</script>
</body>
</html>
