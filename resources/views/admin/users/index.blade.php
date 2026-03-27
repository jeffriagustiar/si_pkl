<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ __('Kelola Pengguna SI-PKL') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 flex justify-between items-center italic">
                <p class="text-slate-500 dark:text-slate-400 font-medium">Manajemen data Admin, Pembimbing, dan Siswa.</p>
                <a href="{{ route('admin.users.create') }}" class="bg-indigo-600 font-bold text-white px-8 py-3 rounded-2xl hover:bg-indigo-700 transition duration-150 shadow-xl shadow-indigo-100 dark:shadow-none flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Pengguna
                </a>
            </div>

            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-2xl border border-slate-200 dark:border-slate-700">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse italic">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-700/50 border-b dark:border-slate-700">
                                <th class="px-8 py-5 text-sm font-black text-slate-700 dark:text-slate-200 uppercase tracking-tighter">Nama & Email</th>
                                <th class="px-8 py-5 text-sm font-black text-slate-700 dark:text-slate-200 uppercase tracking-tighter">Peran</th>
                                <th class="px-8 py-5 text-sm font-black text-slate-700 dark:text-slate-200 uppercase tracking-tighter">Pembimbing (Khusus Siswa)</th>
                                <th class="px-8 py-5 text-sm font-black text-slate-700 dark:text-slate-200 uppercase tracking-tighter text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                            @foreach($users as $user)
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-700/30 transition-colors">
                                <td class="px-8 py-6">
                                    <div class="font-bold text-slate-800 dark:text-white">{{ $user->name }}</div>
                                    <div class="text-xs text-slate-400 dark:text-slate-500 font-medium">{{ $user->email }}</div>
                                </td>
                                <td class="px-8 py-6">
                                    @php
                                        $roleColor = [
                                            'admin' => 'bg-rose-100 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400 border-rose-200 dark:border-rose-800',
                                            'teacher' => 'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 border-emerald-200 dark:border-emerald-800',
                                            'student' => 'bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400 border-indigo-200 dark:border-indigo-800'
                                        ][$user->role];
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-[10px] font-black border {{ $roleColor }} uppercase tracking-widest italic">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    @if($user->role === 'student')
                                        <form action="{{ route('admin.users.pair', $user) }}" method="POST" class="flex items-center space-x-3">
                                            @csrf
                                            <select name="pembimbing_id" onchange="this.form.submit()" class="text-xs bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 py-1.5 px-3 italic">
                                                <option value="">Pilih Pembimbing</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}" {{ $user->pembimbing_id == $teacher->id ? 'selected' : '' }}>
                                                        {{ $teacher->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    @else
                                        <span class="text-xs text-slate-300 dark:text-slate-600 font-bold italic tracking-widest">-</span>
                                    @endif
                                </td>
                                <td class="px-8 py-6 text-right space-x-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="inline-flex p-2 text-slate-400 dark:text-slate-500 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 dark:text-slate-500 hover:text-rose-600 dark:hover:text-rose-400 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v2m3 4h.01"></path></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
