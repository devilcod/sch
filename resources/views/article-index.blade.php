<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Article') }}
        </h2>
    </x-slot>
<div class="p-2 mt-2">
    <x-jet-button type="button"><a href="{{ route('articles.create') }}">Create</a></x-jet-button>
</div>
<div class="flex flex-col mr-5">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Title
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Category
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tag
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Thumbnail
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Action
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach($articles as $article)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">{{ $article->title }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$article->category->name}}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                  @foreach ($article->tags as $tag )
                  <div class="text-sm text-gray-900">{{$tag->name}}</div>
                  @endforeach
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded-full" src="{{ $article->thumbnail }}"></div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ route('articles.edit', $article) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <span>|</span>
                <form action="{{ route('articles.destroy', $article->id ) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-indigo-600 hover:text-indigo-900">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</x-app-layout>
