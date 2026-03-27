<section>
    <header>
        <h2 class="text-xl font-bold text-slate-800 dark:text-slate-100 italic">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400 italic font-medium">
            {{ __("Perbarui informasi profil akun dan alamat email Anda.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6 italic">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 focus:ring-indigo-500 rounded-xl" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Alamat Email')" class="font-bold text-slate-700 dark:text-slate-300 italic" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 focus:ring-indigo-500 rounded-xl" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-indigo-600 font-bold text-white px-8 py-2.5 rounded-xl hover:bg-indigo-700 transition duration-150 shadow-lg shadow-indigo-100 dark:shadow-none italic">
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-600 dark:text-emerald-400 font-bold italic"
                >{{ __('Berhasil disimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
