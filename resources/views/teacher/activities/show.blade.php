<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Review Activity') }} - {{ $activity->student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-indigo-600">Activity Details</h3>
                        <p class="mb-2"><span class="font-bold">Date:</span> {{ $activity->activity_date }}</p>
                        <p class="mb-4"><span class="font-bold">Description:</span> {{ $activity->description }}</p>
                        <div class="rounded-lg overflow-hidden border">
                            <img src="{{ asset('storage/' . $activity->photo_path) }}" alt="Activity Photo" class="w-full h-auto">
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-indigo-600">Review & Feedback</h3>
                        <form action="{{ route('teacher.activities.review', $activity) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select name="status" id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="approved" {{ $activity->status == 'approved' ? 'selected' : '' }}>Approve</option>
                                    <option value="rejected" {{ $activity->status == 'rejected' ? 'selected' : '' }}>Reject / Revision</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <x-input-label for="teacher_comment" :value="__('Comments / Suggestions')" />
                                <textarea name="teacher_comment" id="teacher_comment" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ $activity->teacher_comment }}</textarea>
                            </div>
                            <div class="mb-4">
                                <x-input-label for="rating" :value="__('Rating (1-5)')" />
                                <select name="rating" id="rating" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">No Rating</option>
                                    @for($i=1; $i<=5; $i++)
                                        <option value="{{ $i }}" {{ $activity->rating == $i ? 'selected' : '' }}>{{ $i }} Stars</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="flex justify-end">
                                <x-primary-button>
                                    {{ __('Submit Review') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
