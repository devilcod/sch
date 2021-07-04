<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>
    <div class="px-4 py-5 mx-5 rounded my-5 bg-white sm:p-6 shadow ">
    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-jet-validation-errors class="mb-4" />
            <div>
                <x-jet-label for="name" value="{{ __('Tite') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $article->title) }}" required autofocus autocomplete="title" />
            </div>

            <div class="mt-5">
                <x-jet-label for="name" value="{{ __('Category') }}" />
                <select class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="category_id" name="category_id">
                    <option value="" selected disabled>Choose One</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category !== NULL && $category->id == $article->category->id  ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <button onclick="Livewire.emit('openModal', 'category.create-category')" type="button" class="text-sm text-indigo-600 hover:text-indigo-900">Add New</button>
            </div>

            <div class="mt-5">
                <x-jet-label for="name" value="{{ __('Tag') }}" />
                <select class="select2 block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="tags" name="tags[]" multiple="multiple">
                    @foreach ($article->tags as $tag)
                    <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                <button onclick="Livewire.emit('openModal', 'tag.create-tag')" type="button" class="text-sm text-indigo-600 hover:text-indigo-900">Add New</button>
            </div>

            <div class="mt-4">
                <x-jet-label for="paragraph" value="{{ __('Content Body') }}" />
                <div>
                <textarea id="paragraph" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="text" name="paragraph" required >
                    {!! $article->paragraph !!}
                </textarea>
            </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="thumbnail" value="{{ __('Thumbnail') }}" />
                <x-jet-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail"  />
                {{-- @if (isset($article->thumbnail))
                <div class="flex box-content h-32 w-32 bg-gray-200 rounded-2xl">
                    <img src="{{ $article->thumbnail }}" class="rounded-2xl">
                </div>
                @else
                <x-jet-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" value="{{ old('thumbnail', $article->thumbnail) }}" />
                @endif --}}
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4" type="submit">
                    {{ __('Update') }}
                </x-jet-button>
            </div>
    </form>
    </div>
@section('scripts')
    @include('ckeditor')
    @include('filepond-show')
    @include('select2')
@endsection
</x-app-layout>
