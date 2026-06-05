<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Materi</h2></x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg border border-green-200">{{ session('success') }}</div>
            @endif
            <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
                <div class="p-6 flex justify-between items-center border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Materi Pembelajaran</h3>
                    <a href="{{ route('admin.materials.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Materi
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Topik</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul Materi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Video</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($materials as $i => $material)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $i + 1 }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">{{ $material->topic->title }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $material->title }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($material->description, 60) }}</td>
                                <td class="px-6 py-4 text-sm">
                                    @if($material->video_url)
                                        <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-semibold">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/></svg>
                                            Ada
                                        </span>
                                    @else
                                        <span class="text-gray-400 text-xs">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm space-x-3">
                                    <a href="{{ route('admin.materials.edit', $material->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                                    <form action="{{ route('admin.materials.destroy', $material->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus materi ini?')">
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
