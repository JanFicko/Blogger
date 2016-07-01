@extends('layouts.app')

@section('content')

    <h1>{{ $article->title }}</h1> <br/>

    <a href="{{ $article->id }}/edit">Edit article</a>

    <hr />

    <article>

        <div class="body">{{ $article->body }}</div>

    </article>

@stop