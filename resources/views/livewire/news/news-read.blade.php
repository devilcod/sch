<div>
    {{-- <h1>{{ $title }}</h1>
    <h1>@if(!null == $category){{$category->name}}@else NULL @endif</h1>
    @foreach ($tags as $tag)
    <h1>{{ $tag->name }}</h1>
    @endforeach
    <h1>{{ $thumbnail }}</h1>
    <h1>{{ $paragraph }}</h1> --}}

    <div class="container px-5 mx-auto rounded-lg lg:px-32">
        <div class="flex flex-col w-full mb-2 text-left ">
          <h1 class="mb-2 text-3xl font-black tracking-tightertext-black lg:text-7xl md:text-4xl"> {{ $title }} </h1>
          <p class="mt-4 text-lg leading-snug tracking-tight text-blueGray-500 lg:w-2/3"> @isset($category)
            {{ $category->name }}
          @endisset  @foreach ($tags as $tag)
          {{ $tag->name }}
          @endforeach </p>
        </div>
        <div class="flex flex-col lg:flex-row lg:space-x-12">
          <div class="w-full max-w-screen-sm m-auto mt-12 lg:w-1/4">
            <div class="p-4 transition duration-500 ease-in-out transform bg-white border rounded-lg ">
              <div class="flex py-2">
                <img src="https://d33wubrfki0l68.cloudfront.net/6d60ae66b2a50b1842d08156aeb53663fa328837/d7f97/assets/badges/mike.jpg" class="object-cover w-10 h-10 mr-2 rounded-full">
                <div>
                  <p class="text-sm font-semibold tracking-tight text-black "> Mike Andreuzza </p>
                  <p class="text-sm font-normal tracking-tight text-coolGray-400"> Yoyo player </p>
                </div>
              </div>
              <button class="w-full px-8 py-2 mt-4 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800"> Follow on Twitter </button>
            </div>
          </div>
          <div class="w-full px-4 mt-12 text-lg leading-snug tracking-tight text-blueGray-500 lg:px-0 lg:w-3/4 shadow shadow-md">
            <img src="{{ $thumbnail }}" class="w-full rounded" alt="">
            <div class="py-4 ml-2">
                {!! $paragraph !!}
            </div>
          </div>
        </div>
        <div class="w-full flex pt-6">
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
        </div>
    </div>
    </div>
</div>
