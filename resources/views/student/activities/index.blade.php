<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Activities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex justify-end">
                <a href="{{ route('student.activities.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Upload New Activity
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($activities as $activity)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border">
                    <img src="{{ asset('storage/' . $activity->photo_path) }}" alt="Activity Photo" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-sm text-gray-500 font-semibold uppercase tracking-wider">{{ $activity->activity_date }}</span>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $activity->status == 'approved' ? 'bg-green-100 text-green-800' : ($activity->status == 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($activity->status) }}
                            </span>
                        </div>
                        <p class="text-gray-700 text-sm mb-4 line-clamp-3">{{ $activity->description }}</p>
                        
                        @if($activity->teacher_comment)
                        <div class="mt-4 p-3 bg-gray-50 rounded text-xs italic text-gray-600 border-l-4 border-indigo-400">
                            <strong>Teacher Comment:</strong> {{ $activity->teacher_comment }}
                            @if($activity->rating)
                                <div class="mt-1 font-bold text-indigo-600">Rating: {{ $activity->rating }}/5 Stars</div>
                            @endif
                        </div>
                        @endif

                        <div class="mt-4 flex justify-end space-x-3">
                            @if($activity->status == 'pending')
                            <a href="{{ route('student.activities.edit', $activity) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-semibold">Edit</a>
                            <form action="{{ route('student.activities.destroy', $activity) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-semibold">Delete</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
