<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Topik</h2></x-slot>
    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('admin.topics.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Topik</label>
                            <input type="text" name="title" value="{{ old('title') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('title') border-red-400 @enderror">
                            @error('title')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('description') }}</textarea>
                        </div>
                        <div class="flex justify-end space-x-3 pt-2">
                            <a href="{{ route('admin.topics.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition">Batal</a>
                            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow transition">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
