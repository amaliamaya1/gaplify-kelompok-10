<form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')" class="text-[#475569] font-medium" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-2 block w-full rounded-xl border-[#E2E8F0] shadow-sm focus:border-[#2563EB] focus:ring-[#2563EB]" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')" class="text-[#475569] font-medium" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-2 block w-full rounded-xl border-[#E2E8F0] shadow-sm focus:border-[#2563EB] focus:ring-[#2563EB]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi Baru')" class="text-[#475569] font-medium" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-2 block w-full rounded-xl border-[#E2E8F0] shadow-sm focus:border-[#2563EB] focus:ring-[#2563EB]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold text-sm rounded-xl transition-colors shadow-sm">
                {{ __('Simpan') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-[#10B981]"
                >{{ __('Berhasil disimpan.') }}</p>
            @endif
        </div>
    </form>