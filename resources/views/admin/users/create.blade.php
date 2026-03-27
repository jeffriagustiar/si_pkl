<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ __('Tambah Pengguna Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-2xl border border-slate-200 dark:border-slate-700">
                <div class="p-8 text-slate-900 dark:text-slate-100 italic">
                    <div class="mb-8 border-b dark:border-slate-700 pb-4">
                        <h3 class="text-xl font-bold text-indigo-600 dark:text-indigo-400 flex items-center italic">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                            Registrasi Pengguna SI-PKL
                        </h3>
                        <p class="text-slate-400 dark:text-slate-500 text-sm mt-1 italic font-medium">Masukkan data akun untuk Admin, Pembimbing, atau Siswa.</p>
                    </div>

                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <div>
                                <x-input-label for="name" :value="__('Nama Lengkap')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
                                <x-text-input id="name" class="block mt-1 w-full bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 focus:ring-indigo-500 rounded-xl" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Alamat Email')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
                                <x-text-input id="email" class="block mt-1 w-full bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 focus:ring-indigo-500 rounded-xl" type="email" name="email" :value="old('email')" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="role" :value="__('Peran Pengguna')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
                                <select id="role" name="role" class="block mt-1 w-full bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 focus:ring-indigo-500 rounded-xl italic">
                                    <option value="student">Siswa</option>
                                    <option value="teacher">Pembimbing</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password" :value="__('Kata Sandi')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
                                <x-text-input id="password" class="block mt-1 w-full bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 focus:ring-indigo-500 rounded-xl" type="password" name="password" required />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-10 space-x-4">
                            <a href="{{ route('admin.users.index') }}" class="text-slate-500 dark:text-slate-400 font-bold hover:text-slate-700 dark:hover:text-slate-200 px-4 italic">Batal</a>
                            <button type="submit" class="bg-indigo-600 font-bold text-white px-10 py-3 rounded-2xl hover:bg-indigo-700 transition duration-150 shadow-xl shadow-indigo-100 dark:shadow-none flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Simpan Pengguna
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
