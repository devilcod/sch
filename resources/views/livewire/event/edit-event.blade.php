<x-modal form-action="updateEvent">
    <x-slot name="title">
        View This Event
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="title" value="{{ __('Title') }}" />
            <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model="title" autocomplete="title" placeholder="title goes here" />
            <x-jet-input-error for="title" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="description" value="{{ __('Description') }}" />
            <x-jet-input id="description" type="text" class="mt-1 block w-full" wire:model="description" autocomplete="description" placeholder="write the description" />
            <x-jet-input-error for="description" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="scheduled_at" value="{{ __('Scheduled Date') }}" />
            <x-date-picker wire:model="scheduled_at" id="date" />
            <x-jet-input-error for="scheduled_at" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="buttons">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
        <x-jet-secondary-button type="button" wire:click="$emit('closeModal')" class="ml-4"> {{ __('Cancel') }} </x-jet-secondary-button>
        <x-jet-danger-button type="button" wire:click="deleteEvent()" class="ml-4"> {{ __('Delete') }} </x-jet-danger-button>
    </x-slot>
</x-modal>
