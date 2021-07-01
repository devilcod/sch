<div>
    <h1>{{ $title }}</h1>
    <h1>@if(!null == $category){{$category->name}}@else NULL @endif</h1>
    @foreach ($tags as $tag)
    <h1>{{ $tag->name }}</h1>
    @endforeach
    <h1>{{ $thumbnail }}</h1>
    <h1>{{ $paragraph }}</h1>
</div>
