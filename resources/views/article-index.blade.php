<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Article') }}
        </h2>
    </x-slot>
    @livewire('article.article-index')
</x-app-layout>
