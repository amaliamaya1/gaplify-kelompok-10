    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('patch')

        {{-- Foto Profil --}}
        <div>
            <label class="block text-[13px] font-semibold text-[#475569] mb-2">Foto Profil (Opsional)</label>
            <div class="flex items-center gap-3">

                {{-- Avatar Preview --}}
                <div class="w-[42px] h-[42px] rounded-full overflow-hidden flex items-center justify-center bg-[#EFF6FF] border-2 border-[#DBEAFE] shrink-0">
                    @if ($user->avatar)
                        <img id="avatar-preview-img" src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                        <div id="avatar-preview-initials" class="w-full h-full flex items-center justify-center hidden">
                            <span class="text-sm font-bold text-[#2563EB]">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                        </div>
                    @else
                        <div id="avatar-preview-initials" class="w-full h-full flex items-center justify-center">
                            <span class="text-sm font-bold text-[#2563EB]">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                        </div>
                        <img id="avatar-preview-img" src="" alt="Avatar" class="w-full h-full object-cover hidden">
                    @endif
                </div>

                {{-- Choose File Button + Filename inline --}}
                <label for="avatar"
                    class="inline-flex items-center cursor-pointer bg-[#DBEAFE] hover:bg-[#BFDBFE] text-[#2563EB] text-[13px] font-medium px-4 py-1.5 rounded-full transition-colors shrink-0 select-none">
                    Choose File
                </label>
                <input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden" />
                <span id="avatar-filename" class="text-[13px] text-[#64748B] truncate max-w-[240px]">No file chosen</span>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        {{-- Nama Lengkap --}}
        <div>
            <label for="name" class="block text-[13px] font-semibold text-[#475569] mb-1.5">Nama Lengkap</label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="block w-full px-4 py-2.5 rounded-xl border border-[#E2E8F0] bg-white text-[14px] text-[#0F172A] shadow-sm focus:outline-none focus:border-[#2563EB] focus:ring-2 focus:ring-[#2563EB]/20 transition"
            >
            <x-input-error class="mt-1.5" :messages="$errors->get('name')" />
        </div>

        {{-- Alamat Email --}}
        <div>
            <label for="email" class="block text-[13px] font-semibold text-[#475569] mb-1.5">Alamat Email</label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="block w-full px-4 py-2.5 rounded-xl border border-[#E2E8F0] bg-white text-[14px] text-[#0F172A] shadow-sm focus:outline-none focus:border-[#2563EB] focus:ring-2 focus:ring-[#2563EB]/20 transition"
            >
            <x-input-error class="mt-1.5" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <p class="mt-2 text-[13px] text-[#0F172A]">
                    {{ __('Alamat email Anda belum diverifikasi.') }}
                    <button form="send-verification" class="underline text-[#2563EB] hover:text-[#1D4ED8]">
                        {{ __('Kirim ulang verifikasi.') }}
                    </button>
                </p>
                @if (session('status') === 'verification-link-sent')
                    <p class="mt-1 text-[13px] font-medium text-green-600">Tautan verifikasi baru telah dikirim.</p>
                @endif
            @endif
        </div>

        {{-- Tombol Simpan --}}
        <div class="flex items-center gap-4 pt-1">
            <button type="submit" class="px-6 py-2.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold text-[13px] rounded-xl transition-colors shadow-sm">
                Simpan
            </button>
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-[13px] font-medium text-[#10B981]"
                >Berhasil disimpan.</p>
            @endif
        </div>
    </form>

    {{-- Live preview foto yang dipilih --}}
    <script>
        document.getElementById('avatar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            // Update filename label inline
            const nameEl = document.getElementById('avatar-filename');
            if (nameEl) nameEl.textContent = file.name;

            // Live preview
            const reader = new FileReader();
            reader.onload = function(ev) {
                const img = document.getElementById('avatar-preview-img');
                const initials = document.getElementById('avatar-preview-initials');
                if (img) {
                    img.src = ev.target.result;
                    img.classList.remove('hidden');
                }
                if (initials) initials.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        });
    </script>
