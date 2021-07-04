<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-label/>
                @livewire('overview.article-overview')
                {{-- <h1>All Views : {{ visits('App\Models\Article')->count(); }}</h1>
                <h1>Today : {{ visits('App\Models\Article')->period('day')->count(); }}</h1> --}}
            </div>
        </div>
    </div>
</x-app-layout>
