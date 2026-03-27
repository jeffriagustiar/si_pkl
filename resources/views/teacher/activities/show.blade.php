<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ __('Tinjau Kegiatan Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-2xl border border-slate-200 dark:border-slate-700 italic font-medium">
                <div class="p-8">
                    <div class="flex flex-col md:flex-row gap-8 mb-10">
                        <div class="w-full md:w-1/2">
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $activity->photo_path) }}" alt="Bukti Kegiatan" class="w-full h-auto rounded-2xl shadow-lg border-2 border-white dark:border-slate-700 transition-transform group-hover:scale-105 duration-500">
                                <div class="absolute top-4 right-4">
                                     <span class="px-3 py-1 rounded-full text-[10px] font-black border bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 border-indigo-200 dark:border-indigo-800 uppercase tracking-widest italic">
                                        {{ \Carbon\Carbon::parse($activity->activity_date)->translatedFormat('d F Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="mb-6">
                                <h4 class="text-xs font-black text-slate-400 dark:text-slate-500 tracking-widest uppercase mb-2">Nama Siswa</h4>
                                <p class="text-xl font-bold text-slate-800 dark:text-white">{{ $activity->student->name }}</p>
                            </div>
                            <div class="mb-6">
                                <h4 class="text-xs font-black text-slate-400 dark:text-slate-500 tracking-widest uppercase mb-2">Deskripsi Kegiatan</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed italic">"{{ $activity->description }}"</p>
                            </div>
                            <div class="mb-6">
                                <h4 class="text-xs font-black text-slate-400 dark:text-slate-500 tracking-widest uppercase mb-2">Status Saat Ini</h4>
                                @php
                                    $statusColor = [
                                        'pending' => 'bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 border-orange-200 dark:border-orange-800',
                                        'approved' => 'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 border-emerald-200 dark:border-emerald-800',
                                        'rejected' => 'bg-rose-100 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400 border-rose-200 dark:border-rose-800'
                                    ][$activity->status];
                                @endphp
                                <span class="px-4 py-1 rounded-full text-xs font-bold border {{ $statusColor }} uppercase tracking-widest italic">
                                    {{ $activity->status }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 dark:bg-slate-900/50 p-8 rounded-3xl border border-slate-100 dark:border-slate-700">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Penilaian Pembimbing
                        </h3>
                        <form action="{{ route('teacher.activities.review', $activity) }}" method="POST">
                            @csrf
                            <div class="space-y-6">
                                <div>
                                    <x-input-label for="status" :value="__('Hasil Tinjauan')" class="font-black text-slate-700 dark:text-slate-300 italic" />
                                    <select name="status" class="block mt-1 w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 rounded-xl focus:ring-indigo-500 italic">
                                        <option value="approved" {{ $activity->status == 'approved' ? 'selected' : '' }}>Setujui Kegiatan</option>
                                        <option value="rejected" {{ $activity->status == 'rejected' ? 'selected' : '' }}>Tolak Kegiatan</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="teacher_comment" :value="__('Komentar / Saran')" class="font-black text-slate-700 dark:text-slate-300 italic" />
                                    <textarea name="teacher_comment" rows="4" class="block mt-1 w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 rounded-xl focus:ring-indigo-500 py-3 px-4 italic" placeholder="Berikan masukan untuk siswa...">{{ old('teacher_comment', $activity->teacher_comment) }}</textarea>
                                </div>
                                <div>
                                    <x-input-label for="rating" :value="__('Rating Kegiatan (1-5 Bintang)')" class="font-black text-slate-700 dark:text-slate-300 italic" />
                                    <select name="rating" class="block mt-1 w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 rounded-xl focus:ring-indigo-500 italic">
                                        @for($i=1; $i<=5; $i++)
                                            <option value="{{ $i }}" {{ $activity->rating == $i ? 'selected' : '' }}>{{ $i }} Bintang</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="pt-4 flex items-center justify-end space-x-4">
                                    <a href="{{ route('teacher.students') }}" class="text-slate-500 dark:text-slate-400 font-bold hover:text-slate-700 dark:hover:text-slate-200 px-4 italic">Batal</a>
                                    <button type="submit" class="bg-indigo-600 font-bold text-white px-10 py-3 rounded-2xl hover:bg-indigo-700 transition duration-150 shadow-xl shadow-indigo-100 dark:shadow-none flex items-center italic">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Simpan Penilaian
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
