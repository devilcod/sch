<div>
    @foreach ($articles as $article)
    <h1>{{ $article->title }}</h1>
    <h1>{{ $article->thumbnail }}</h1>
    @if (isset($article->category))
    <h1>Category: {{ $article->category->name }}</h1>
    @endif
    <h1>{{ $article->paragraph }}</h1>
    @foreach ($article->tags as $tag)
    <h1>Tag: {{ $tag->name }}</h1>
    @endforeach
    @endforeach
</div>
