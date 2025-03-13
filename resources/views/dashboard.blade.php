<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="bg-gray-700 shadow-sm sm:rounded-lg">
            <div class="p-4 dark:text-gray-100">
                <div class="card-body">
                    <div class="clearfix">
                        <a class="no-underline bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" href="{{ route('event.index') }}">Event</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>