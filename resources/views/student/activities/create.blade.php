<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ __('Unggah Kegiatan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-2xl border border-slate-200 dark:border-slate-700">
                <div class="p-8 text-slate-900 dark:text-slate-100 italic">
                    <div class="mb-8 border-b dark:border-slate-700 pb-4">
                        <h3 class="text-xl font-bold text-indigo-600 dark:text-indigo-400 flex items-center italic">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Formulir Jurnal PKL
                        </h3>
                        <p class="text-slate-400 dark:text-slate-500 text-sm mt-1 italic font-medium">Lengkapi rincian kegiatan harian Anda di bawah ini.</p>
                    </div>

                    <form action="{{ route('student.activities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-6">
                            <div>
                                <x-input-label for="activity_date" :value="__('Tanggal Kegiatan')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
                                <x-text-input id="activity_date" class="block mt-1 w-full bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 focus:ring-indigo-500 rounded-xl" type="date" name="activity_date" :value="old('activity_date')" required />
                                <x-input-error :messages="$errors->get('activity_date')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="description" :value="__('Deskripsi Kegiatan')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
                                <textarea id="description" name="description" rows="5" class="block mt-1 w-full border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm bg-slate-50 dark:bg-slate-900 py-3 px-4 italic placeholder-slate-400 dark:placeholder-slate-500" placeholder="Ceritakan apa yang Anda lakukan hari ini..." required>{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="photo" :value="__('Foto Bukti Kegiatan')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 dark:border-slate-700 border-dashed rounded-xl bg-slate-50 dark:bg-slate-900/50 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-slate-400 dark:text-slate-500" stroke="currentColor" fill="none" viewBox="0 0 48 48"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                        <div class="flex text-sm text-slate-600 dark:text-slate-400">
                                            <label for="photo" class="relative cursor-pointer bg-white dark:bg-slate-800 rounded-md font-bold text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 px-2">
                                                <span>Klik untuk unggah</span>
                                                <input id="photo" name="photo" type="file" class="sr-only" required>
                                            </label>
                                            <p class="pl-1 italic">atau seret dan lepas</p>
                                        </div>
                                        <p class="text-xs text-slate-500 dark:text-slate-600 italic">PNG, JPG, JPEG hingga 10MB</p>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-10 space-x-4">
                            <a href="{{ route('student.activities.index') }}" class="text-slate-500 dark:text-slate-400 font-bold hover:text-slate-700 dark:hover:text-slate-200 px-4 italic">Batal</a>
                            <button type="submit" class="bg-indigo-600 font-bold text-white px-10 py-3 rounded-2xl hover:bg-indigo-700 transition duration-150 shadow-xl shadow-indigo-100 dark:shadow-none flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Kirim Kegiatan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
