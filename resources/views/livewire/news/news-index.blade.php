<div>
<header>
    <div class="flex p-2 mt-2 bg-white shadow">
        <input wire:model="search" class="w-full rounded" type="text" placeholder="search something"/>
    </div>
</header>
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
                <h2 class="mb-8 text-xs font-semibold tracking-widest text-black uppercase title-font">{{ visits($article)->count(); }}</h2>
                <a href="{{ route('news.show', $article) }}" class="mx-auto mb-4 text-2xl font-semibold leading-none tracking-tighter text-black lg:text-3xl title-font"> {{ $article->title }} </a>
                <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 ">{!! Str::limit($article->paragraph, 70, '...') !!}</p>
                <p class="inline-flex items-center mt-auto font-semibold text-blue-600 lg:mb-0 hover:text-black " title="read more"> {{ $article->updated_at->diffForHumans() }} </p>
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
    <button wire:click="load_more()">{{ __('Load More') }}</button>
  </div>
</div>
