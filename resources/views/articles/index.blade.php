@extends('layout')

@section('content')

    <h1>Articles</h1> <br/>
    <a href="articles/create">Create new</a>
    <hr />

    @foreach ($articles as $article)

        <article>

            <h2>
                <a href="articles/{{ $article->id }}">{{ $article->title }}</a><br />
                OR <br/>
                <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
            </h2>

            <div class="body">{{ $article->body }}</div>

        </article>

    @endforeach

@stop