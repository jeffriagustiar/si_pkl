<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ __('Daftar Siswa Bimbingan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-2xl border border-slate-200 dark:border-slate-700 p-8 italic">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($students as $student)
                    <div class="bg-slate-50 dark:bg-slate-900/50 rounded-2xl overflow-hidden border border-slate-100 dark:border-slate-700 shadow-sm hover:shadow-md transition-all group">
                        <div class="p-6">
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="bg-indigo-100 dark:bg-indigo-900/50 p-3 rounded-xl">
                                    <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 dark:text-white">{{ $student->name }}</h4>
                                    <p class="text-xs text-slate-400 dark:text-slate-500">{{ $student->email }}</p>
                                </div>
                            </div>

                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between text-xs font-bold italic">
                                    <span class="text-slate-400 dark:text-slate-500 uppercase tracking-widest">Total Jurnal</span>
                                    <span class="text-slate-700 dark:text-slate-300">{{ $student->activities_count }} Kegiatan</span>
                                </div>
                                <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-1.5">
                                    <div class="bg-indigo-600 h-1.5 rounded-full" style="width: 100%"></div>
                                </div>
                            </div>

                            @php
                                $pendingCount = $student->activities()->where('status', 'pending')->count();
                            @endphp

                            <div class="flex items-center justify-between mb-6">
                                <span class="text-[10px] font-black uppercase tracking-widest {{ $pendingCount > 0 ? 'text-orange-500 animate-pulse' : 'text-emerald-500' }} italic">
                                    {{ $pendingCount > 0 ? "$pendingCount Perlu Ditinjau" : "Semua Terulas" }}
                                </span>
                            </div>

                            <a href="{{ route('teacher.students') }}" class="block w-full text-center bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-black text-xs py-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition duration-150">
                                LIHAT PERKEMBANGAN
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-20 text-center">
                        <p class="text-slate-400 dark:text-slate-500 font-bold italic">Belum ada siswa yang dibimbing.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
