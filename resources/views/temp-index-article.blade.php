<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
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
                  Tags
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Content
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($articles as $article)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img class="h-10 w-10 rounded-full" src="{{ $article->thumbnail }}" alt="">
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ $article->title }}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">@if(!null == $article->category){{$article->category->name}}@else NULL @endif</div>
                  {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @foreach ($article->tags as $tag )
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{$tag->name}}
                        </span>
                    @endforeach
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {!! Str::limit($article->paragraph, 20, $end='..') !!}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="{{ route('articles.edit', $article) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                  <form action="{{ route('articles.destroy', $article->id ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-indigo-600 hover:text-indigo-900">Del</button>
                    </form>
                </td>
              </tr>

              <!-- More people... -->
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


