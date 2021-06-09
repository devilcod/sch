<x-modal>
    <x-slot name="title">
        All Tags
    </x-slot>
<x-slot name="content">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($tags as $tag)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">{{ $tag->name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><button type="button" wire:click="$emit('openModal', 'tag.edit-tag', {{ json_encode(["tag" => $tag->id]) }})">{{ __('Edit') }}</button></div>
                    <span></span>
                    <div class="text-sm text-gray-900"><button type="button" wire:click="$emit('openModal', 'tag.delete-tag', {{ json_encode(["tag" => $tag->id]) }})">{{ __('Delete') }}</button></div>
                </td>
            </tr>
            @empty
            <tr>
                <td>Empty</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</x-slot>
    <x-slot name="buttons">
        <x-jet-button type="button" wire:click="$emit('openModal', 'tag.create-tag')"> {{ __('Create a New Tag') }} </x-jet-danger-button>
        <x-jet-secondary-button type="button" wire:click="$emit('closeModal')" class="ml-4"> {{ __('Cancel') }} </x-jet-secondary-button>
    </x-slot>
</x-modal>
