<div>
    @foreach ($articles as $article)
    <h1>{{ $article->title }}</h1>
    <h1>{{ $article->thumbnail }}</h1>
    <h1>{{ $article->category->name }}</h1>
    <h1>{{ $article->paragraph }}</h1>
    @foreach ($article->tags as $tag)
    <h1>{{ $tag->name }}</h1>
    @endforeach
    @endforeach
</div>
