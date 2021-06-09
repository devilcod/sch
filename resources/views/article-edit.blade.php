<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modify an Article') }}
        </h2>
    </x-slot>
    <x-jet-authentication-card>
        <x-jet-validation-errors class="mb-4" />

        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <x-jet-label for="name" value="{{ __('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $article->title) }}" required autofocus autocomplete="title" />
            </div>

            <div>
                <x-jet-label for="name" value="{{ __('Category') }}" />
                <select class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="category_id" name="category_id">
                    <option value="" selected disabled>Choose One</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category !== NULL && $category->id == $article->category->id  ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <button onclick="Livewire.emit('openModal', 'category.create-category')" type="button">Add New</button>
            </div>

            <div>
                <x-jet-label for="name" value="{{ __('Tag') }}" />
                <select class="select2 block mt-1 w-full" id="tags" name="tags[]" multiple="multiple">
                    @foreach ($article->tags as $tag)
                    <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                <button onclick="Livewire.emit('openModal', 'tag.create-tag')" type="button">Add New</button>
            </div>

            <div class="mt-4">
                <x-jet-label for="paragraph" value="{{ __('Body') }}" />
                <div>
                <textarea id="paragraph" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="text" name="paragraph" required>{!! $article->paragraph !!}</textarea>
            </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="thumbnail" value="{{ __('Thumbnail') }}" />
                @if (isset($article->thumbnail))
                <div class="flex box-content h-32 w-32 bg-gray-200 rounded-2xl">
                    <img src="{{ $article->thumbnail }}" class="rounded-2xl">
                </div>
                @else
                <x-jet-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" value="{{ old('thumbnail', $article->thumbnail) }}" />
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Update') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
@section('scripts')
    @include('ckeditor')
    @include('filepond')
    @include('select2')
@endsection
</x-app-layout>
