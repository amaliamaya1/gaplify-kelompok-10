<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Soal</h2></x-slot>
    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('admin.questions.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Topik</label>
                            <select name="topic_id" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 @error('topic_id') border-red-400 @enderror">
                                <option value="">-- Pilih Topik --</option>
                                @foreach($topics as $topic)
                                <option value="{{ $topic->id }}" {{ old('topic_id') == $topic->id ? 'selected' : '' }}>{{ $topic->title }}</option>
                                @endforeach
                            </select>
                            @error('topic_id')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pertanyaan</label>
                            <textarea name="question" rows="3" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 @error('question') border-red-400 @enderror">{{ old('question') }}</textarea>
                            @error('question')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        @foreach(['a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D'] as $key => $label)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pilihan {{ $label }}</label>
                            <input type="text" name="option_{{ $key }}" value="{{ old('option_'.$key) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 @error('option_'.$key) border-red-400 @enderror">
                            @error('option_'.$key)<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        @endforeach
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jawaban Benar</label>
                            <select name="correct_answer" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 @error('correct_answer') border-red-400 @enderror">
                                <option value="">-- Pilih Jawaban --</option>
                                @foreach(['A','B','C','D'] as $ans)
                                <option value="{{ $ans }}" {{ old('correct_answer') === $ans ? 'selected' : '' }}>{{ $ans }}</option>
                                @endforeach
                            </select>
                            @error('correct_answer')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div class="flex justify-end space-x-3 pt-2">
                            <a href="{{ route('admin.questions.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition">Batal</a>
                            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow transition">Simpan Soal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
