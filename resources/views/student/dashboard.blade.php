<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ __('Beranda Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-2xl p-8 border-b-4 border-indigo-600 transition-all hover:scale-105 duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-indigo-100 dark:bg-indigo-900/50 rounded-xl text-indigo-600 dark:text-indigo-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <div>
                            <div class="text-slate-500 dark:text-slate-400 text-sm font-semibold uppercase tracking-wider">Total Kegiatan</div>
                            <div class="text-4xl font-black text-slate-900 dark:text-white">{{ $stats['total_activities'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-2xl p-8 border-b-4 border-emerald-600 transition-all hover:scale-105 duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-emerald-100 dark:bg-emerald-900/50 rounded-xl text-emerald-600 dark:text-emerald-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <div class="text-slate-500 dark:text-slate-400 text-sm font-semibold uppercase tracking-wider">Disetujui</div>
                            <div class="text-4xl font-black text-slate-900 dark:text-white">{{ $stats['approved_activities'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-2xl p-8 border-b-4 border-orange-600 transition-all hover:scale-105 duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-orange-100 dark:bg-orange-900/50 rounded-xl text-orange-600 dark:text-orange-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <div class="text-slate-500 dark:text-slate-400 text-sm font-semibold uppercase tracking-wider">Tertunda</div>
                            <div class="text-4xl font-black text-slate-900 dark:text-white">{{ $stats['pending_activities'] }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pemberitahuan -->
            @if($notifications->count() > 0)
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-2xl mb-8 border border-orange-100 dark:border-orange-900/30">
                <div class="p-8 text-slate-900 dark:text-slate-100 italic">
                    <h3 class="text-xl font-bold mb-4 text-orange-600 dark:text-orange-400 flex items-center">
                        <svg class="w-6 h-6 mr-3 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        Pemberitahuan Baru
                    </h3>
                    <ul class="divide-y divide-slate-100 dark:divide-slate-700 italic">
                        @foreach($notifications as $notification)
                        <li class="py-4 flex justify-between items-center group">
                            <div class="flex-1">
                                <p class="text-sm font-bold text-slate-800 dark:text-slate-200 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors italic">
                                    {{ $notification->data['message'] }}
                                </p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 italic">Ditinjau oleh: <span class="font-bold text-slate-700 dark:text-slate-300">{{ $notification->data['teacher_name'] }}</span></p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <!-- Aksi Cepat -->
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-2xl border border-slate-100 dark:border-slate-700">
                <div class="p-8 italic">
                    <h3 class="text-xl font-bold mb-6 text-slate-800 dark:text-white border-b dark:border-slate-700 pb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Aksi Cepat Siswa
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('student.activities.create') }}" class="flex items-center justify-between p-6 bg-indigo-600 rounded-2xl font-bold text-white hover:bg-indigo-700 transition duration-150 shadow-xl shadow-indigo-100 dark:shadow-none group">
                            <span class="flex items-center">
                                <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Unggah Kegiatan Baru
                            </span>
                            <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        <a href="{{ route('student.activities.index') }}" class="flex items-center justify-between p-6 bg-slate-800 dark:bg-slate-700 rounded-2xl font-bold text-white hover:bg-slate-900 dark:hover:bg-slate-600 transition duration-150 shadow-xl shadow-slate-200 dark:shadow-none group">
                            <span class="flex items-center">
                                <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                Riwayat Kegiatan Saya
                            </span>
                            <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
