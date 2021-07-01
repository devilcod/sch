<div>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('All Article') }}
    </h2>
</x-slot>
   <div class="flex p-2 mt-2">
        <x-jet-button type="button"><a href="{{ route('articles.create') }}">Create New Article</a></x-jet-button>
        <x-jet-secondary-button wire:click="$emit('openModal', 'category.index-category')">{{ __('View All Categories') }}</x-jet-secondary-button>
        <x-jet-secondary-button wire:click="$emit('openModal', 'tag.index-tag')">{{ __('View All Tags') }}</x-jet-secondary-button>
        <div class="bg-white shadow ml-5 flex justify-end">
            <input wire:model="search" class="w-full rounded" type="text" placeholder="search something"/>
            <button wire:click="$emit('beginSearch')" type="submit" class="bg-red-400 hover:bg-red-300 rounded text-white ml-2 pl-4 pr-4">
                    <p class="font-semibold text-xs">Search</p>
            </button>
        </div>
    </div>
    <section class="text-blueGray-700 anti-aliashed transition duration-1000 ease-in-out">
        <div wire:loading.class="animate-pulse" wire:target="load" class="container items-center px-5 py-8 mx-auto lg:px-24">
          <div class="flex flex-wrap mb-12 text-left">
            @forelse ($articles as $article)
            <div class="w-full mx-auto lg:w-1/3">
                <div class="p-6">
                    <img class="object-cover object-center w-full mb-8 lg:h-48 md:h-36" src="{{ $article->thumbnail }}" alt="blog">
                    <h2 class="mb-8 text-xs font-semibold tracking-widest text-black uppercase title-font">
                        @foreach ($article->tags as $tag)
                        {{ $tag->name }}
                        @endforeach
                    </h2>
                    <h2 class="mb-8 text-xs font-semibold tracking-widest text-black uppercase title-font">@if(!null == $article->category){{$article->category->name}}@else NULL @endif</h2>
                    <a href="{{ route('articles.edit', $article) }}" class="mx-auto mb-4 text-2xl font-semibold leading-none tracking-tighter text-black lg:text-3xl title-font"> {{ $article->title }} </a>
                    <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 ">{!! Str::limit($article->paragraph, 70, '...') !!}</p>
                    <div wire:poll>
                        <p class="inline-flex items-center mt-auto font-semibold text-blue-600 lg:mb-0 hover:text-black " title="read more"> {{ $article->updated_at->diffForHumans() }} </p>
                    </div>
                    <div class="py-2 inline-block item-center justify-end gird-cols">
                        <button wire:click="deleteArticle({{ $article->id }})" class="ml-auto text-red-600 hover:text-black" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                            </svg>
                        </button>
                            {{-- <button wire:click="$emit('openModal', 'article.article-delete', {{ json_encode(['article' => $article->id]) }})" class="ml-auto text-red-600 hover:text-black" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                </svg>
                            </button> --}}
                    </div>
                  </div>
            </div>
            @empty
            <div class="w-full mx-auto lg:w-1/3">
                <h1 class="text-red-500 text-lg">Not Found!!</h1>
            </div>
        @endforelse
          </div>
        </div>
      </section>
      <div class="ml-5 py-4">
        <x-jet-button wire:click="load()">{{ __('Load More') }}</x-jet-button>
      </div>
</div>

