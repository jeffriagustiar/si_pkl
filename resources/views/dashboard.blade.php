<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-2xl border border-slate-200 dark:border-slate-700">
                <div class="p-12 text-center italic">
                    <div class="inline-flex p-6 bg-indigo-50 dark:bg-indigo-900/30 rounded-full mb-6">
                        <svg class="w-16 h-16 text-indigo-600 dark:text-indigo-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <h3 class="text-3xl font-black text-slate-900 dark:text-white italic tracking-tighter mb-4">Selamat Datang di SI-PKL</h3>
                    <p class="text-slate-500 dark:text-slate-400 max-w-lg mx-auto leading-relaxed italic font-medium">
                        Anda telah berhasil masuk ke sistem. Silakan gunakan menu navigasi untuk mengelola kegiatan Praktik Kerja Lapangan Anda.
                    </p>
                    <div class="mt-10">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-8 py-3 bg-indigo-600 border border-transparent rounded-2xl font-bold text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-xl shadow-indigo-100 dark:shadow-none italic">
                            Mulai Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
