<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Materi</h2></x-slot>
    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('admin.materials.update', $material->id) }}" method="POST" class="space-y-5">
                        @csrf @method('PATCH')
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Topik</label>
                            <select name="topic_id" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500">
                                @foreach($topics as $topic)
                                <option value="{{ $topic->id }}" {{ old('topic_id', $material->topic_id) == $topic->id ? 'selected' : '' }}>{{ $topic->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Materi</label>
                            <input type="text" name="title" value="{{ old('title', $material->title) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 @error('title') border-red-400 @enderror">
                            @error('title')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                            <textarea name="description" rows="2" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500">{{ old('description', $material->description) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Konten Materi</label>
                            <textarea name="content" rows="10" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 font-mono @error('content') border-red-400 @enderror">{{ old('content', $material->content) }}</textarea>
                            @error('content')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">URL Video YouTube <span class="text-gray-400 font-normal">(opsional)</span></label>
                            <input type="url" name="video_url" value="{{ old('video_url', $material->video_url) }}" placeholder="https://www.youtube.com/embed/xxxx" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div class="flex justify-end space-x-3 pt-2">
                            <a href="{{ route('admin.materials.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition">Batal</a>
                            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow transition">Update Materi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
