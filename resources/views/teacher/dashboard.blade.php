<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ __('Beranda Pembimbing') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-2xl p-8 border-b-4 border-indigo-600 transition-all hover:scale-105 duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-indigo-100 dark:bg-indigo-900/50 rounded-xl text-indigo-600 dark:text-indigo-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <div>
                            <div class="text-slate-500 dark:text-slate-400 text-sm font-semibold uppercase tracking-wider">Total Siswa Bimbingan</div>
                            <div class="text-4xl font-black text-slate-900 dark:text-white">{{ $stats['total_students'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-2xl p-8 border-b-4 border-orange-600 transition-all hover:scale-105 duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-orange-100 dark:bg-orange-900/50 rounded-xl text-orange-600 dark:text-orange-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <div class="text-slate-500 dark:text-slate-400 text-sm font-semibold uppercase tracking-wider">Kegiatan Belum Diulas</div>
                            <div class="text-4xl font-black text-slate-900 dark:text-white">{{ $stats['pending_reviews'] }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aksi Cepat -->
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-2xl border border-slate-100 dark:border-slate-700">
                <div class="p-8 italic">
                    <h3 class="text-xl font-bold mb-6 text-slate-800 dark:text-white border-b dark:border-slate-700 pb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Aksi Cepat Pembimbing
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('teacher.students') }}" class="flex items-center justify-between p-6 bg-slate-800 dark:bg-slate-700 rounded-2xl font-bold text-white hover:bg-slate-900 dark:hover:bg-slate-600 transition duration-150 shadow-xl shadow-slate-200 dark:shadow-none group">
                            <span class="flex items-center">
                                <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                Lihat Daftar Siswa Bimbingan
                            </span>
                            <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        <div class="flex items-center justify-between p-6 bg-indigo-600 rounded-2xl font-bold text-white shadow-xl shadow-indigo-100 dark:shadow-none opacity-90">
                           <span class="flex items-center italic">
                               <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                               Monitoring Kegiatan Secara Real-time
                           </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
