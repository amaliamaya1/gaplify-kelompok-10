<x-test-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <span class="font-bold text-[#0F172A] text-[16px]">{{ request()->query('topic_id') ? ($questions->first()->topic->title ?? 'Ujian') : 'Semua Topik' }}</span>
            <div class="flex space-x-3">
                <a href="{{ route('student.test.index') }}" class="inline-flex items-center px-3 py-1.5 border border-gray-200 rounded-lg text-xs font-medium text-gray-600 bg-white hover:bg-gray-50 shadow-sm">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Ganti Topik
                </a>
                <a href="{{ route('student.dashboard') }}" class="inline-flex items-center px-3 py-1.5 border border-gray-200 rounded-lg text-xs font-medium text-red-600 bg-white hover:bg-red-50 shadow-sm" onclick="return confirm('Yakin ingin keluar? Progres tes ini tidak akan disimpan.')">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    Keluar
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-[900px] mx-auto pb-12" x-data="quizApp({{ $questions->toJson() }}, {{ $attempt->id }})">
        
        <div class="flex justify-center items-center space-x-6 mb-10">
            <span class="inline-flex items-center bg-white px-5 py-2 rounded-full text-[13px] font-bold text-gray-600 shadow-sm">
                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Pilihan Ganda
            </span>
            <span class="inline-flex items-center bg-white px-5 py-2 rounded-full text-[13px] font-bold text-gray-600 shadow-sm">
                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Tanpa Batas Waktu
            </span>
            <span class="inline-flex items-center bg-white px-5 py-2 rounded-full text-[13px] font-bold text-gray-600 shadow-sm">
                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Jawab Semua Soal
            </span>
        </div>

        <!-- Progress Bar -->
        <div class="mb-4">
            <div class="flex justify-between items-end mb-2">
                <span class="text-[15px] font-extrabold text-gray-900">Soal <span x-text="currentIndex + 1"></span> dari <span x-text="questions.length"></span></span>
                <span class="text-sm font-bold text-gray-500"><span x-text="currentIndex + 1"></span>/<span x-text="questions.length"></span></span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-[6px]">
                <div class="bg-gradient-to-r from-[#2563EB] to-[#06B6D4] h-[6px] rounded-full transition-all duration-300" :style="`width: ${((currentIndex + 1) / questions.length) * 100}%`"></div>
            </div>
        </div>

        <!-- Question Card -->
        <div class="bg-white rounded-[1.5rem] shadow-sm border border-gray-100 p-8 mb-6">
            <template x-if="questions.length > 0">
                <div>
                    <p class="text-[12px] font-bold text-gray-500 uppercase tracking-widest mb-6">SOAL <span x-text="currentIndex + 1"></span> - <span x-text="questions[currentIndex].topic ? questions[currentIndex].topic.title.toUpperCase() : 'SEMUA TOPIK'"></span></p>
                    
                    <h3 class="text-[19px] font-bold text-gray-900 mb-8 leading-relaxed" x-text="questions[currentIndex].question"></h3>
                    
                    <!-- Options -->
                    <div class="space-y-4">
                        <template x-for="optionKey in ['A', 'B', 'C', 'D']" :key="optionKey">
                            <label class="flex items-center p-5 border rounded-2xl cursor-pointer transition-all"
                                :class="answers[questions[currentIndex].id] === optionKey ? 'border-[#2563EB] bg-[#EFF6FF]' : 'border-gray-200 hover:bg-gray-50'">
                                <input type="radio" :name="'question_' + questions[currentIndex].id" :value="optionKey" x-model="answers[questions[currentIndex].id]" class="hidden">
                                <div class="w-[34px] h-[34px] flex items-center justify-center rounded-full mr-5 font-bold text-[14px] shrink-0 transition-colors"
                                    :class="answers[questions[currentIndex].id] === optionKey ? 'bg-[#2563EB] text-white shadow-md' : 'bg-gray-100 text-gray-500'">
                                    <span x-text="optionKey"></span>
                                </div>
                                <span class="text-[15px] font-semibold text-gray-800" x-text="questions[currentIndex]['option_' + optionKey.toLowerCase()]"></span>
                            </label>
                        </template>
                    </div>

                    <!-- Navigation inside card bottom -->
                    <div class="mt-10 flex justify-between items-center pt-6 border-t border-gray-50">
                        <button @click="prev()" :disabled="currentIndex === 0" class="inline-flex items-center px-5 py-2.5 rounded-xl font-bold text-sm transition-colors" :class="currentIndex === 0 ? 'text-gray-300 cursor-not-allowed' : 'text-gray-600 border border-gray-200 hover:bg-gray-50'">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Sebelumnya
                        </button>
                        
                        <template x-if="currentIndex < questions.length - 1">
                            <button @click="next()" class="inline-flex items-center px-6 py-2.5 bg-[#2563EB] hover:bg-blue-700 text-white rounded-xl font-bold text-sm transition-colors shadow-sm">
                                Selanjutnya
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </template>

                        <template x-if="currentIndex === questions.length - 1">
                            <form method="POST" action="{{ route('student.test.submit') }}">
                                @csrf
                                <input type="hidden" name="attempt_id" :value="attemptId">
                                <!-- Create hidden inputs for all answers -->
                                <template x-for="(ans, qId) in answers" :key="qId">
                                    <input type="hidden" :name="'answers[' + qId + ']'" :value="ans">
                                </template>
                                
                                <button type="button" @click="submitTest($event)" class="inline-flex items-center px-6 py-2.5 bg-[#10B981] hover:bg-emerald-600 text-white rounded-xl font-bold text-sm transition-colors shadow-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Submit Jawaban
                                </button>
                            </form>
                        </template>
                    </div>
                </div>
            </template>
        </div>

        <!-- Progress Tracker -->
        <div class="bg-white rounded-[1.5rem] shadow-sm border border-gray-100 p-8">
            <div class="flex items-center mb-6">
                <div class="w-8 h-8 bg-blue-50 text-[#2563EB] rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                </div>
                <h4 class="font-extrabold text-gray-900 text-[16px]">Progress Per Topik</h4>
            </div>
            
            <div class="flex flex-wrap gap-4 mb-2">
                <template x-for="(q, index) in questions" :key="q.id">
                    <button @click="currentIndex = index" 
                        class="w-[52px] h-[52px] rounded-xl font-bold text-[16px] transition-all flex items-center justify-center shadow-sm"
                        :class="answers[q.id] 
                            ? 'bg-[#2563EB] text-white border-2 border-[#2563EB]' 
                            : (currentIndex === index ? 'border-2 border-[#2563EB] bg-white text-[#2563EB]' : 'bg-white border border-gray-200 text-gray-600 hover:border-gray-400')">
                        <span x-text="index + 1"></span>
                    </button>
                </template>
            </div>
            
            <div class="flex items-center space-x-6 mt-8 pt-5 border-t border-gray-100 text-[12px] font-semibold text-gray-500">
                <div class="flex items-center">
                    <div class="w-3.5 h-3.5 bg-[#2563EB] rounded-[3px] mr-2.5"></div>
                    Sudah Dijawab
                </div>
                <div class="flex items-center">
                    <div class="w-3.5 h-3.5 bg-white border-2 border-gray-200 rounded-[3px] mr-2.5"></div>
                    Belum Dijawab
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('quizApp', (questions, attemptId) => ({
                questions: questions,
                attemptId: attemptId,
                currentIndex: 0,
                answers: {}, // map of question.id => option (A, B, C, D)
                
                next() {
                    if (this.currentIndex < this.questions.length - 1) {
                        this.currentIndex++;
                    }
                },
                
                prev() {
                    if (this.currentIndex > 0) {
                        this.currentIndex--;
                    }
                },
                
                submitTest(event) {
                    // Check if all answered
                    const answeredCount = Object.keys(this.answers).length;
                    if (answeredCount < this.questions.length) {
                        if(!confirm(`Kamu baru menjawab ${answeredCount} dari ${this.questions.length} soal. Yakin ingin submit sekarang?`)) {
                            return;
                        }
                    }
                    event.target.closest('form').submit();
                }
            }))
        })
    </script>
</x-test-layout>
