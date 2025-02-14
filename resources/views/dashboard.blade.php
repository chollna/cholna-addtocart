<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="big-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21l-1-1 4-4H7l4-4-1-1 6-6 6 6-1 1-4 4h4l-4 4z" />
            </svg>
            <a href="{{ route('welcome') }}" class="btn btn-primary btn-block">View product</a>
        </div>
        
        <div class="big-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21l-1-1 4-4H7l4-4-1-1 6-6 6 6-1 1-4 4h4l-4 4z" />
            </svg>
            <a href="{{ route('index') }}" class="btn btn-primary btn-block">GOTO CRUD</a>
        </div>



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
