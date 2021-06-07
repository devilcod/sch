<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('School Settings') }}
        </h2>
    </x-slot>
    <x-jet-form-section submit="updateSetting" class="mt-5 p-4">
        <x-slot name="title">
            {{ __('School Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update your school information') }}
        </x-slot>

        <x-slot name="form">
            <!-- Profile Photo -->
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model="logo"
                                x-ref="logo"/>

                    <x-jet-label for="logo" value="{{ __('Logo') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2">
                        @if ($newLogo !== null)
                        <img src="{{ $logo->temporaryUrl() }}" alt="" class="rounded-full h-20 w-20 object-cover">
                        @elseif($logo)
                        <img src="{{ Storage::url('public/' . $logo) }}" alt="" class="rounded-full h-20 w-20 object-cover">
                        @else
                        <div class="rounded-full h-20 w-20 object-cover border border-green-400"></div>
                        @endif
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.logo.click()">
                        {{ __('Select A New Logo') }}
                    </x-jet-secondary-button>

                    <x-jet-input-error for="logo" class="mt-2" />
                </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('School Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>

            {{-- Address --}}
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="address" value="{{ __('School Address') }}" />
                <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model="address" autocomplete="address" />
                <x-jet-input-error for="address" class="mt-2" />
            </div>

            {{-- Phone --}}
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="phone" value="{{ __('School Phone') }}" />
                <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model="phone" autocomplete="phone" />
                <x-jet-input-error for="phone" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="email" value="{{ __('School Email') }}" />
                <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model="email" />
                <x-jet-input-error for="email" class="mt-2" />
            </div>

            <!-- Accreditation -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="accreditation" value="{{ __('School Accreditation') }}" />
                <x-jet-input id="accreditation" type="text" class="mt-1 block w-full" wire:model="accreditation" />
                <x-jet-input-error for="email" class="mt-2" />
            </div>

            <!-- Accreditation -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="npsn" value="{{ __('School Npsn') }}" />
                <x-jet-input id="npsn" type="text" class="mt-1 block w-full" wire:model="npsn" />
                <x-jet-input-error for="npsn" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="updated">
                {{ __('Updated.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="logo">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

</div>
