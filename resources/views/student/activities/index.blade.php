<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ __('Riwayat Kegiatan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 flex justify-end">
                <a href="{{ route('student.activities.create') }}" class="bg-indigo-600 font-bold text-white px-8 py-3 rounded-2xl hover:bg-indigo-700 transition duration-150 shadow-xl shadow-indigo-100 dark:shadow-none flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Unggah Kegiatan Baru
                </a>
            </div>

            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-2xl border border-slate-200 dark:border-slate-700 p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 italic">
                    @forelse($activities as $activity)
                    <div class="bg-slate-50 dark:bg-slate-900/50 rounded-2xl overflow-hidden border border-slate-100 dark:border-slate-700 shadow-sm hover:shadow-md transition-shadow">
                        <div class="h-48 overflow-hidden relative group">
                            <img src="{{ asset('storage/' . $activity->photo_path) }}" alt="Foto Kegiatan" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4">
                                @php
                                    $statusColor = [
                                        'pending' => 'bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 border-orange-200 dark:border-orange-800',
                                        'approved' => 'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 border-emerald-200 dark:border-emerald-800',
                                        'rejected' => 'bg-rose-100 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400 border-rose-200 dark:border-rose-800'
                                    ][$activity->status];
                                    $statusLabel = [
                                        'pending' => 'Menunggu',
                                        'approved' => 'Disetujui',
                                        'rejected' => 'Ditolak'
                                    ][$activity->status];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $statusColor }} shadow-sm uppercase tracking-widest italic">
                                    {{ $statusLabel }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 italic">
                                {{ \Carbon\Carbon::parse($activity->activity_date)->translatedFormat('d F Y') }}
                            </div>
                            <p class="text-slate-700 dark:text-slate-300 text-sm line-clamp-3 mb-6 font-medium italic leading-relaxed">
                                {{ $activity->description }}
                            </p>

                            @if($activity->teacher_comment)
                            <div class="bg-indigo-50 dark:bg-indigo-900/20 p-4 rounded-xl mb-6 border border-indigo-100 dark:border-indigo-800 italic">
                                <span class="block text-[10px] font-bold text-indigo-400 dark:text-indigo-500 uppercase tracking-widest mb-1 italic">Komentar Pembimbing</span>
                                <p class="text-indigo-700 dark:text-indigo-300 text-xs italic">"{{ $activity->teacher_comment }}"</p>
                                @if($activity->rating)
                                    <div class="flex mt-2 items-center text-amber-500">
                                        @for($i=0; $i<$activity->rating; $i++)
                                            <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                            @endif

                            <div class="flex items-center space-x-3 mt-auto">
                                @if($activity->status == 'pending')
                                <a href="{{ route('student.activities.edit', $activity) }}" class="flex-1 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-bold text-xs py-2 rounded-lg text-center hover:bg-slate-50 dark:hover:bg-slate-700 transition duration-150">
                                    Edit
                                </a>
                                <form action="{{ route('student.activities.destroy', $activity) }}" method="POST" class="flex-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 font-bold text-xs py-2 rounded-lg hover:bg-rose-100 dark:hover:bg-rose-900/50 transition duration-150">
                                        Hapus
                                    </button>
                                </form>
                                @else
                                <span class="flex-1 text-center py-2 text-xs font-bold text-slate-400 dark:text-slate-500 italic bg-slate-100 dark:bg-slate-700/50 rounded-lg">Sudah Ditinjau</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-20 text-center italic">
                        <div class="inline-flex p-6 bg-slate-50 dark:bg-slate-900/50 rounded-full mb-4">
                            <svg class="w-12 h-12 text-slate-300 dark:text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="text-slate-500 dark:text-slate-400 font-bold italic">Belum ada kegiatan yang diunggah.</h3>
                        <p class="text-slate-400 dark:text-slate-500 text-sm mt-2 font-medium italic">Mulai catat kegiatan PKL harian Anda sekarang!</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
