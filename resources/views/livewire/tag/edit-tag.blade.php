<div>
    <x-modal form-action="updateTag">
        <x-slot name="title">
            Edit This Tag
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="buttons">
            <x-jet-button type="submit">
                {{ __('Create') }}
            </x-jet-button>
            <x-jet-secondary-button type="button" wire:click="$emit('closeModal')" class="ml-4"> {{ __('Cancel') }} </x-jet-secondary-button>
        </x-slot>
    </x-modal>
</div>
