<div>
    <div class="py-4 mt-5 shadow-x1">
        <div class="px-4">
          <div class="block md:flex justify-between md:-mx-2">
              @foreach ($news as $article)
              <div class="w-full lg:w-1/3 md:mx-2 mb-4 md:mb-0">
                <div class="bg-white rounded-lg overflow-hidden shadow-lg relative">
                  <img class="h-56 w-full object-cover object-center" src="{{ $article->thumbnail }}" alt="">
                  <div class="p-4 h-auto md:h-40 lg:h-48">
                    <a href="{{ route('news.show', $article) }}" class="block text-blue-500 hover:text-blue-600 font-semibold mb-2 text-lg md:text-base lg:text-lg">
                      {{ $article->title }}
                    </a>
                    <div class="text-gray-600 text-sm leading-relaxed block md:text-xs lg:text-sm">
                      {!! Str::limit($article->paragraph, 260, '...') !!}
                    </div>
                    <div class="relative mt-2 lg:absolute bottom-0 mb-4 md:hidden lg:block">
                        @foreach ($article->tags as $tag)
                        <a class="inline bg-red-300 py-1 px-2 rounded-full text-xs lowercase text-gray-700" href="{{ route('tag.related', $tag) }}">{{ $tag->name }}</a>
                        @endforeach
                        @if (!null == $article->category)
                        <a class="inline bg-green-300 py-1 px-2 rounded-full text-xs lowercase text-gray-700" href="{{ route('category.related', $article->category) }}">{{$article->category->name}}</a>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
    </div>
</div>
