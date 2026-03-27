<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 overflow-hidden relative">
        <!-- Abstract Decorations -->
        <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

        <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl shadow-2xl overflow-hidden sm:rounded-3xl border border-white/20 dark:border-slate-700/50 relative z-10 transition-all duration-500">
            <div class="text-center mb-8">
                <div class="inline-flex p-4 bg-indigo-600 rounded-2xl shadow-lg mb-6 transform hover:rotate-6 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h2 class="text-2xl font-black text-slate-800 dark:text-white tracking-tighter uppercase italic">Verifikasi Email</h2>
                <p class="text-slate-500 dark:text-slate-400 font-bold italic mt-2 text-sm leading-relaxed">
                    {{ __('Terima kasih telah mendaftar! Harap verifikasi email Anda dengan mengklik tautan yang kami kirimkan. Jika belum menerima, kami bisa kirim ulang.') }}
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 font-bold text-sm text-emerald-600 dark:text-emerald-400 text-center italic">
                    {{ __('Tautan verifikasi baru telah dikirim ke email Anda.') }}
                </div>
            @endif

            <div class="mt-8 flex flex-col space-y-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-4 rounded-2xl shadow-xl shadow-indigo-200 dark:shadow-indigo-900/40 transform transition-all active:scale-95 duration-150 flex items-center justify-center space-x-3">
                        <span>KIRIM ULANG VERIFIKASI</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="text-center">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-slate-500 dark:text-slate-400 hover:text-rose-600 dark:hover:text-rose-400 hover:underline transition-all italic">
                        {{ __('Keluar Sesi') }}
                    </button>
                </form>
            </div>

            <div class="mt-10 text-center">
                <p class="text-[10px] text-slate-400 dark:text-slate-500 font-bold italic uppercase tracking-widest">
                    &copy; Urang Awak
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
