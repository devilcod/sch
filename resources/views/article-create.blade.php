@extends('layouts.app')
@section('content')
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Tite') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
            </div>

            <div>
                <x-jet-label for="name" value="{{ __('Category') }}" />
                <select class="block mt-1 w-full" id="category_id" name="category_id">
                    <option value="" selected disabled>Choose One</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <x-jet-label for="name" value="{{ __('Tag') }}" />
                <select class="block mt-1 w-full" id="tag_id" name="tag_id">
                    <option value="" selected disabled>Choose One</option>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="paragraph" value="{{ __('Body') }}" />
                <div>
                <textarea id="paragraph" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="text" name="paragraph" required >
                </textarea>
            </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="thumbnail" value="{{ __('Thumbnail') }}" />
                {{-- <div class="flex box-content h-32 w-32 bg-gray-200 rounded-2xl">

                </div> --}}
                <x-jet-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Create') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    @endsection
@section('scripts')
    @include('ckeditor')
@include('filepond')
@endsection
