<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-[#0F172A] text-[20px]">Notifikasi</h2>
    </x-slot>

    <div class="py-8 bg-[#f8fafc]" x-data="{ hasUnread: localStorage.getItem('notifications_read') !== 'true' }">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6 px-4 sm:px-0">
                <h3 class="text-lg font-bold text-gray-900">Pemberitahuan Anda</h3>
                <button x-show="hasUnread" @click="localStorage.setItem('notifications_read', 'true'); hasUnread = false;" class="text-sm text-blue-600 hover:text-blue-800 font-semibold transition-colors bg-blue-50 hover:bg-blue-100 px-4 py-1.5 rounded-full">
                    Tandai semua dibaca
                </button>
            </div>

            <div class="bg-white shadow-sm sm:rounded-2xl border border-gray-100 overflow-hidden">
                <div class="divide-y divide-gray-50">
                    
                    <!-- Notification Item 1 (Unread) -->
                    <div :class="hasUnread ? 'bg-blue-50/30' : 'bg-white'" class="p-5 flex gap-4 hover:bg-gray-50/80 transition-colors relative cursor-pointer" @click="localStorage.setItem('notifications_read', 'true'); hasUnread = false;">
                        <div x-show="hasUnread" class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500"></div>
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0 text-blue-600 mt-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-bold text-gray-900 mb-0.5">Selamat datang di Gaplify!</h4>
                            <p class="text-sm text-gray-600">Platform pembelajaran interaktif yang membantu kamu belajar TKJ dengan lebih efektif. Jangan ragu untuk mencoba tes diagnostik pertamamu!</p>
                            <p class="text-[11px] font-medium text-blue-500 mt-1.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                2 jam yang lalu
                            </p>
                        </div>
                    </div>

                    <!-- Notification Item 2 (Read) -->
                    <div class="p-5 flex gap-4 hover:bg-gray-50/80 transition-colors cursor-pointer">
                        <div class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center flex-shrink-0 text-green-500 mt-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-gray-800 mb-0.5">Akun Berhasil Dibuat</h4>
                            <p class="text-sm text-gray-500">Terima kasih telah mendaftar. Silakan lengkapi profil Anda untuk pengalaman yang lebih baik.</p>
                            <p class="text-[11px] font-medium text-gray-400 mt-1.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                1 hari yang lalu
                            </p>
                        </div>
                    </div>

                </div>
                
                <div class="p-4 border-t border-gray-50 bg-gray-50/30 text-center">
                    <button class="text-sm text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        Tampilkan notifikasi sebelumnya
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
