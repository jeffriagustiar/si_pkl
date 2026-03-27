<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Activities</div>
                    <div class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['total_activities'] }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-gray-500 text-sm font-medium uppercase tracking-wider">Approved</div>
                    <div class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['approved_activities'] }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-yellow-500">
                    <div class="text-gray-500 text-sm font-medium uppercase tracking-wider">Pending</div>
                    <div class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['pending_activities'] }}</div>
                </div>
            </div>

            @if($notifications->count() > 0)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border-l-4 border-orange-500">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-3 text-orange-600 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        Notifications
                    </h3>
                    <ul class="divide-y divide-gray-100">
                        @foreach($notifications as $notification)
                        <li class="py-3 flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-800">{{ $notification->data['message'] }}</p>
                                <p class="text-xs text-gray-500">Reviewed by {{ $notification->data['teacher_name'] }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4 text-indigo-600">Quick Actions</h3>
                    <div class="flex space-x-4">
                        <a href="{{ route('student.activities.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Upload Activity
                        </a>
                        <a href="{{ route('student.activities.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            My Activities
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
