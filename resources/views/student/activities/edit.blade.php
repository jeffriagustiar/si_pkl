<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Activity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <form action="{{ route('student.activities.update', $activity) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <x-input-label for="activity_date" :value="__('Activity Date')" />
                            <x-text-input id="activity_date" class="block mt-1 w-full" type="date" name="activity_date" :value="old('activity_date', $activity->activity_date)" required />
                            <x-input-error :messages="$errors->get('activity_date')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('description', $activity->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="photo" :value="__('Photo (Leave blank to keep current)')" />
                            <input id="photo" name="photo" type="file" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                            <div class="mt-2">
                                <p class="text-xs text-gray-500">Current photo:</p>
                                <img src="{{ asset('storage/' . $activity->photo_path) }}" class="mt-1 h-20 w-auto rounded border">
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update Activity') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
