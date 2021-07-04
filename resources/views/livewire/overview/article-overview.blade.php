<div>
    <h1>Views Overview :</h1>
    <p>All Views : {{ visits('App\Models\Article')->count(); }}</p>
    <p>Today : {{ visits('App\Models\Article')->period('day')->count(); }}</p>
    <p>This Week : {{ visits('App\Models\Article')->period('week')->count(); }}</p>
    <p>This Month : {{ visits('App\Models\Article')->period('month')->count(); }}</p>

    <div class="mt-5">
        <h1>Top Articles :</h1>
        @foreach ($topArticles as $data)
            <p>Title : {{ $data->title }}
                <span>|| with views : {{ visits($data)->count() }} time(s)</span>
            </p>
        @endforeach
    </div>

    <div class="mt-5">
        <h1>List Views : </h1>
        @foreach ($articles as $article)
        <ul>
            <p>{{ $article->title }}</p>
            <p class="ml-5"> Views : {{ visits($article)->count() }}</p>
        @endforeach
    </div>
</div>
