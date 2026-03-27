<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 overflow-hidden relative">
        <!-- Abstract Decorations -->
        <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

        <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl shadow-2xl overflow-hidden sm:rounded-3xl border border-white/20 dark:border-slate-700/50 relative z-10 transition-all duration-500">
            <div class="text-center mb-8">
                <div class="inline-flex p-4 bg-indigo-600 rounded-2xl shadow-lg mb-6 transform hover:rotate-6 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h2 class="text-2xl font-black text-slate-800 dark:text-white tracking-tighter uppercase italic">Konfirmasi Sandi</h2>
                <p class="text-slate-500 dark:text-slate-400 font-bold italic mt-2 text-sm leading-relaxed">
                    {{ __('Ini adalah area yang aman. Harap konfirmasi kata sandi Anda sebelum melanjutkan.') }}
                </p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6 italic">
                @csrf

                <!-- Password -->
                <div class="space-y-2">
                    <x-input-label for="password" :value="__('Kata Sandi')" class="font-black text-slate-700 dark:text-slate-300" />
                    <x-text-input id="password" class="block w-full bg-slate-50/50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 focus:ring-4 focus:ring-indigo-500/20 rounded-2xl py-4" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="pt-4">
                    <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-4 rounded-2xl shadow-xl shadow-indigo-200 dark:shadow-indigo-900/40 transform transition-all active:scale-95 duration-150 flex items-center justify-center space-x-3">
                        <span>KONFIRMASI LANJUT</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </button>
                </div>
            </form>

            <div class="mt-10 text-center">
                <p class="text-[10px] text-slate-400 dark:text-slate-500 font-bold italic uppercase tracking-widest">
                    &copy; Urang Awak
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
