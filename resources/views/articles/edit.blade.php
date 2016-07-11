@extends('layouts.app')

@section('content')

    <h1>Edit: {{ $article->title }}</h1>

    {!! Form::model($article, ['method' => 'PATCH', 'url' => 'articles/' . $article->id]) !!}

        @include('articles._form', ['submitButtonText' => 'Update article'])

    {!! Form::close() !!}

    @include('errors.list')

@stop