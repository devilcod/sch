<div>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form wire:submit.prevent="addArticle">


            <div>
                <x-jet-label for="name" value="{{ __('Tite') }}" />
                <x-jet-input wire:model="title" id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
            </div>

            <div>
                <x-jet-label for="name" value="{{ __('Category') }}" />
                <select wire:model="category_id" class="block mt-1 w-full" id="category_id" name="category_id">
                    <option value="" selected disabled>Choose One</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <x-jet-label for="name" value="{{ __('Tag') }}" />
                <select wire:model="tag_id" class="block mt-1 w-full" id="tag_id" name="tag_id">
                    <option value="" selected disabled>Choose One</option>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="paragraph" value="{{ __('Body') }}" />
                <div wire:ignore>
                <textarea wire:model="paragraph" id="paragraph" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="text" name="paragraph" required >
                </textarea>
            </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="thumbnail" value="{{ __('Thumbnail') }}" />
                <div class="flex box-content h-32 w-32 bg-gray-200 rounded-2xl">
                    @if($thumbnail)
                    <img src="{{ $thumbnail->temporaryUrl() }}" class="rounded-2xl">
                    @endif
                  </div>
                  <div
                  x-data="{ isUploading: false, progress: 0 }"
                  x-on:livewire-upload-start="isUploading = true"
                  x-on:livewire-upload-finish="isUploading = false"
                  x-on:livewire-upload-error="isUploading = false"
                  x-on:livewire-upload-progress="progress = $event.detail.progress"
                  >
                <x-jet-input wire:model="thumbnail" id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnaiil')" required />
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress" class="flex rounded bg-pink-500 shadow-none ">
                      <div class="relative pt-1">
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
                          <div style="width:30%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                        </div>
                      </div>
                    </progress>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Create') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</div>
@section('scripts')
<script>
    ClassicEditor
                .create(document.querySelector('#paragraph'))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
					@this.set('paragraph', editor.getData());
                    })
               })
                .catch(error => {
                    console.error(error);
                });
</script>
@endsection
