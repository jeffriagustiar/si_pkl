<section class="space-y-6 text-slate-900 dark:text-slate-100 italic font-medium">
    <header>
        <h2 class="text-xl font-bold text-rose-600 dark:text-rose-500 italic">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400 italic font-medium leading-relaxed">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="rounded-xl font-bold px-6 py-2.5 italic transition-all duration-200"
    >{{ __('Hapus Akun Saya') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 italic bg-white dark:bg-slate-800 transition-colors duration-300">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-slate-800 dark:text-white italic">
                {{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}
            </h2>

            <p class="mt-4 text-sm text-slate-500 dark:text-slate-400 italic font-medium leading-relaxed">
                {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
            </p>

            <div class="mt-8">
                <x-input-label for="password" :value="__('Kata Sandi')" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 focus:ring-rose-500 rounded-xl"
                    placeholder="{{ __('Masukkan Kata Sandi') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <x-secondary-button x-on:click="$dispatch('close')" class="rounded-xl font-bold px-6 py-2.5 italic dark:bg-slate-700 dark:text-slate-300 dark:hover:bg-slate-600 border-none">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="rounded-xl font-bold px-6 py-2.5 italic">
                    {{ __('Hapus Akun Sekarang') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
