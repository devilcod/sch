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
            <x-jet-button>
                {{ __('Create') }}
            </x-jet-button>
        </x-slot>
    </x-modal>
</div>
