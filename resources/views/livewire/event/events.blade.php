<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Events Viewed by Calendar') }}
        </h2>
    </x-slot>
    <x-jet-button type="button" wire:click="$emit('openModal', 'event.create-event')" class="m-5 p-5">{{ __('Create New Event') }}</x-jet-button>
    <div class="p2 m-2">
        <livewire:appointments-calendar/>
    </div>
</div>
