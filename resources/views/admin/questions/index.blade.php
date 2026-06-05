<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Soal</h2></x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg border border-green-200">{{ session('success') }}</div>
            @endif
            <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
                <div class="p-6 flex justify-between items-center border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800">Bank Soal ({{ $questions->count() }} soal)</h3>
                    <a href="{{ route('admin.questions.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Soal
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Topik</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pertanyaan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jawaban Benar</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($questions as $i => $question)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $i + 1 }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded-full">{{ $question->topic->title }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 max-w-xs">{{ Str::limit($question->question, 80) }}</td>
                                <td class="px-6 py-4">
                                    <span class="w-8 h-8 inline-flex items-center justify-center bg-green-100 text-green-800 text-sm font-bold rounded-full">{{ $question->correct_answer }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm space-x-3">
                                    <a href="{{ route('admin.questions.edit', $question->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                                    <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus soal ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
