    <p class="text-[13px] text-[#64748B] leading-relaxed mb-6">
        Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh semua data atau informasi yang ingin Anda simpan.
    </p>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#EF4444] hover:bg-[#DC2626] text-white font-semibold text-[13px] rounded-xl transition-colors shadow-sm"
    >
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
        </svg>
        Hapus Akun
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-[16px] font-bold text-[#0F172A]">
                Apakah Anda yakin ingin menghapus akun?
            </h2>

            <p class="mt-1.5 text-[13px] text-[#64748B] leading-relaxed">
                Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi.
            </p>

            <div class="mt-5">
                <label for="password" class="block text-[13px] font-semibold text-[#475569] mb-1.5">Kata Sandi</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Masukkan kata sandi"
                    class="block w-3/4 px-4 py-2.5 rounded-xl border border-[#E2E8F0] bg-white text-[14px] text-[#0F172A] shadow-sm focus:outline-none focus:border-[#EF4444] focus:ring-2 focus:ring-[#EF4444]/20 transition"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-1.5" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="px-5 py-2.5 bg-white border border-[#E2E8F0] hover:bg-[#F8FAFC] text-[#475569] font-semibold text-[13px] rounded-xl transition-colors"
                >Batal</button>
                <button
                    type="submit"
                    class="px-5 py-2.5 bg-[#EF4444] hover:bg-[#DC2626] text-white font-semibold text-[13px] rounded-xl transition-colors shadow-sm"
                >Hapus Akun</button>
            </div>
        </form>
    </x-modal>
