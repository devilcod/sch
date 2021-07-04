<div>
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
                    <a href="{{ route('news.show', $article) }}" class="mx-auto mb-4 text-2xl font-semibold leading-none tracking-tighter text-black lg:text-3xl title-font"> {{ $article->title }} </a>
                    <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 ">{!! Str::limit($article->paragraph, 70, '...') !!}</p>
                    <div wire:poll>
                        <p class="inline-flex items-center mt-auto font-semibold text-blue-600 lg:mb-0 hover:text-black " title="read more"> {{ $article->updated_at->diffForHumans() }} </p>
                    </div>
                    {{-- <div class="py-2 inline-block item-center justify-end gird-cols">
                        <button wire:click="deleteArticle({{ $article->id }})" class="ml-auto text-red-600 hover:text-black" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                            </svg>
                        </button>
                            <button wire:click="$emit('openModal', 'article.article-delete', {{ json_encode(['article' => $article->id]) }})" class="ml-auto text-red-600 hover:text-black" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                </svg>
                            </button>
                    </div> --}}
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
    {{-- @foreach ($articles as $article)
    <h1>{{ $article->title }}</h1>
    <h1>{{ $article->thumbnail }}</h1>
    <h1>{{ $article->category->name }}</h1>
    <h1>{{ $article->paragraph }}</h1>
    @foreach ($article->tags as $tag)
    <h1>{{ $tag->name }}</h1>
    @endforeach
    @endforeach --}}
</div>
