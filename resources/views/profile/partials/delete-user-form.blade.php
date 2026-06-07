<div class="text-sm text-[#64748B] mb-6">
        {{ __('Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh semua data atau informasi yang ingin Anda simpan.') }}
    </div>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center px-6 py-2.5 bg-[#EF4444] hover:bg-[#DC2626] text-white font-semibold text-sm rounded-xl transition-colors shadow-sm"
    >{{ __('Hapus Akun') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-[#0F172A]">
                {{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}
            </h2>

            <p class="mt-1 text-sm text-[#64748B]">
                {{ __('Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun secara permanen.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Kata Sandi') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 rounded-xl border-[#E2E8F0] shadow-sm focus:border-[#EF4444] focus:ring-[#EF4444]"
                    placeholder="{{ __('Kata Sandi') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="inline-flex items-center px-6 py-2.5 bg-white border border-[#E2E8F0] hover:bg-[#F8FAFC] text-[#475569] font-semibold text-sm rounded-xl transition-colors">
                    {{ __('Batal') }}
                </button>

                <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-[#EF4444] hover:bg-[#DC2626] text-white font-semibold text-sm rounded-xl transition-colors shadow-sm">
                    {{ __('Hapus Akun') }}
                </button>
            </div>
        </form>
    </x-modal>