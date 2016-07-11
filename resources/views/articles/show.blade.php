@extends('layouts.app')

@section('content')

    <h1>{{ $article->title }}</h1> <br/>

    <a href="{{ $article->id }}/edit">Edit article</a>

    <hr />

    <article>

        <div class="body">{{ $article->body }}</div>

    </article>

    @if (!$article->tags->isEmpty())
        <br />
        <h5>Tags:</h5>
        <ul>
            @foreach($article->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endif
@stop