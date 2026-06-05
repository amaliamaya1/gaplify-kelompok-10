    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        {{-- Kata Sandi Saat Ini --}}
        <div>
            <label for="update_password_current_password" class="block text-[13px] font-semibold text-[#475569] mb-1.5">
                Kata Sandi Saat Ini
            </label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="block w-full px-4 py-2.5 rounded-xl border border-[#E2E8F0] bg-white text-[14px] text-[#0F172A] shadow-sm focus:outline-none focus:border-[#2563EB] focus:ring-2 focus:ring-[#2563EB]/20 transition"
            >
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1.5" />
        </div>

        {{-- Kata Sandi Baru --}}
        <div>
            <label for="update_password_password" class="block text-[13px] font-semibold text-[#475569] mb-1.5">
                Kata Sandi Baru
            </label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="block w-full px-4 py-2.5 rounded-xl border border-[#E2E8F0] bg-white text-[14px] text-[#0F172A] shadow-sm focus:outline-none focus:border-[#2563EB] focus:ring-2 focus:ring-[#2563EB]/20 transition"
            >
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1.5" />
        </div>

        {{-- Konfirmasi Kata Sandi Baru --}}
        <div>
            <label for="update_password_password_confirmation" class="block text-[13px] font-semibold text-[#475569] mb-1.5">
                Konfirmasi Kata Sandi Baru
            </label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="block w-full px-4 py-2.5 rounded-xl border border-[#E2E8F0] bg-white text-[14px] text-[#0F172A] shadow-sm focus:outline-none focus:border-[#2563EB] focus:ring-2 focus:ring-[#2563EB]/20 transition"
            >
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1.5" />
        </div>

        {{-- Tombol Simpan --}}
        <div class="flex items-center gap-4 pt-1">
            <button type="submit" class="px-6 py-2.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold text-[13px] rounded-xl transition-colors shadow-sm">
                Simpan
            </button>
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-[13px] font-medium text-[#10B981]"
                >Berhasil disimpan.</p>
            @endif
        </div>
    </form>
