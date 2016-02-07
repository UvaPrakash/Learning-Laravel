@extends('app')

@section('title')
    <title>Articles</title>
@stop

@section('content')
    <h1>Articles</h1>
    @foreach($articles as $article)
        <article>
            <h3>
                <!--<a href="/articles/{{ $article -> id }}">{{ $article -> title }}</a>-->
                <!--<a href="{{ action('ArticlesController@show', [$article -> id]) }}">{{ $article -> title }}</a>-->
                <a href="{{ url('/articles', $article -> id) }}">{{ $article -> title }}</a>
            </h3>
            <div class="body">{{ $article -> body }}</div>
        </article>
    @endforeach
@stop
