<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit User</h2></x-slot>
    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-5">
                        @csrf @method('PATCH')
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('name') border-red-400 @enderror">
                            @error('name')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('email') border-red-400 @enderror">
                            @error('email')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sekolah</label>
                            <input type="text" name="school" value="{{ old('school', $user->school) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('school') border-red-400 @enderror" placeholder="Opsional (misal: SMK IT Ar Rohmah)">
                            @error('school')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru <span class="text-gray-400 font-normal">(kosongkan jika tidak diubah)</span></label>
                            <input type="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('password') border-red-400 @enderror">
                            @error('password')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                            <select name="role" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option value="student" {{ (old('role', $user->role) === 'student') ? 'selected' : '' }}>Student</option>
                                <option value="teacher" {{ (old('role', $user->role) === 'teacher') ? 'selected' : '' }}>Teacher</option>
                                <option value="admin" {{ (old('role', $user->role) === 'admin') ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <div class="flex justify-end space-x-3 pt-2">
                            <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition">Batal</a>
                            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow transition">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
