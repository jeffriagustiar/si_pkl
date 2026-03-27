<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 overflow-hidden relative">
        <!-- Abstract Decorations -->
        <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

        <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl shadow-2xl overflow-hidden sm:rounded-3xl border border-white/20 dark:border-slate-700/50 relative z-10 transition-all duration-500">
            <div class="text-center mb-10">
                <div class="inline-flex p-4 bg-indigo-600 rounded-2xl shadow-lg shadow-indigo-200 dark:shadow-indigo-900/40 mb-6 transform hover:rotate-6 transition-transform">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h1 class="text-4xl font-black text-slate-800 dark:text-white tracking-tighter italic uppercase">SI-PKL</h1>
                <p class="text-slate-500 dark:text-slate-400 font-bold italic mt-2">Selamat Datang di Portal Jurnal PKL</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6 italic">
                @csrf

                <!-- Email Address -->
                <div class="space-y-2">
                    <x-input-label for="email" :value="__('Alamat Email')" class="font-black text-slate-700 dark:text-slate-300" />
                    <x-text-input id="email" class="block w-full bg-slate-50/50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 focus:ring-4 focus:ring-indigo-500/20 rounded-2xl py-4" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <x-input-label for="password" :value="__('Kata Sandi')" class="font-black text-slate-700 dark:text-slate-300" />
                    <x-text-input id="password" class="block w-full bg-slate-50/50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 focus:ring-4 focus:ring-indigo-500/20 rounded-2xl py-4" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" class="rounded-lg border-slate-300 dark:border-slate-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-slate-900" name="remember">
                        <span class="ms-2 text-sm font-bold text-slate-600 dark:text-slate-400 group-hover:text-indigo-600 transition-colors italic">Ingat Saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-bold text-indigo-600 dark:text-indigo-400 hover:underline transition-all italic" href="{{ route('password.request') }}">
                            Lupa sandi?
                        </a>
                    @endif
                </div>

                <div class="pt-4">
                    <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-4 rounded-2xl shadow-xl shadow-indigo-200 dark:shadow-indigo-900/20 transform transition-all active:scale-95 duration-150 flex items-center justify-center space-x-3">
                        <span>MASUK SEKARANG</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
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
