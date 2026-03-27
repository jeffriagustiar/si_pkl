<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ __('Perbarui Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-2xl border border-slate-200 dark:border-slate-700">
                <div class="p-8 text-slate-900 dark:text-slate-100 italic">
                    <div class="mb-8 border-b dark:border-slate-700 pb-4">
                        <h3 class="text-xl font-bold text-indigo-600 dark:text-indigo-400 flex items-center italic">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Edit Jurnal PKL
                        </h3>
                        <p class="text-slate-400 dark:text-slate-500 text-sm mt-1 italic font-medium">Perbarui rincian kegiatan harian Anda di bawah ini.</p>
                    </div>

                    <form action="{{ route('student.activities.update', $activity) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-6">
                            <div>
                                <x-input-label for="activity_date" :value="__('Tanggal Kegiatan')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
                                <x-text-input id="activity_date" class="block mt-1 w-full bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 focus:ring-indigo-500 rounded-xl" type="date" name="activity_date" :value="old('activity_date', $activity->activity_date)" required />
                                <x-input-error :messages="$errors->get('activity_date')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="description" :value="__('Deskripsi Kegiatan')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
                                <textarea id="description" name="description" rows="5" class="block mt-1 w-full border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm bg-slate-50 dark:bg-slate-900 py-3 px-4 italic placeholder-slate-400 dark:placeholder-slate-500" placeholder="Ceritakan apa yang Anda lakukan hari ini..." required>{{ old('description', $activity->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="photo" :value="__('Foto Bukti (Biarkan kosong jika tidak diganti)')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
                                <div class="mt-1 flex items-center space-x-6 bg-slate-50 dark:bg-slate-900/50 p-6 rounded-xl border border-slate-200 dark:border-slate-700 italic">
                                    <div class="shrink-0">
                                        <img class="h-20 w-20 object-cover rounded-xl border-2 border-white dark:border-slate-700 shadow-sm" src="{{ asset('storage/' . $activity->photo_path) }}" alt="Foto Saat Ini">
                                    </div>
                                    <div class="flex-1">
                                        <label class="block">
                                            <span class="sr-only">Pilih foto baru</span>
                                            <input id="photo" name="photo" type="file" class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-indigo-50 dark:file:bg-indigo-900/50 file:text-indigo-700 dark:file:text-indigo-300 hover:file:bg-indigo-100 dark:hover:file:bg-indigo-900 transition-colors italic">
                                        </label>
                                        <p class="text-[10px] text-slate-400 dark:text-slate-500 mt-2 italic">*Hanya jika ingin mengganti bukti kegiatan</p>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-10 space-x-4">
                            <a href="{{ route('student.activities.index') }}" class="text-slate-500 dark:text-slate-400 font-bold hover:text-slate-700 dark:hover:text-slate-200 px-4 italic">Batal</a>
                            <button type="submit" class="bg-indigo-600 font-bold text-white px-10 py-3 rounded-2xl hover:bg-indigo-700 transition duration-150 shadow-xl shadow-indigo-100 dark:shadow-none flex items-center italic">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                Perbarui Jurnal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
