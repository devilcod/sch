<div>
    <x-modal form-action="deleteArticle">
        <x-slot name="title">
            <svg class="inline-block h-8 w-8 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
              <span class="text-lg">Delete Article</span>
        </x-slot>

        <x-slot name="content">
            <p class="text-sm text-gray-500">
                Are you sure want to delete this article bitch???
              </p>
        </x-slot>

        <x-slot name="buttons">
              <x-jet-danger-button type="submit"> {{ __('Delete') }} </x-jet-danger-button>
              <x-jet-secondary-button type="button" wire:click="$emit('closeModal')" class="ml-4"> {{ __('Cancel') }} </x-jet-secondary-button>
        </x-slot>
    </x-modal>
</div>
