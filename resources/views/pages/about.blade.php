@extends('layouts.app')

@section('content')

    <!--
        In this example nothing will go through
        -- THE SAFE WAY --
     -->

    @if ($name == 'Jan')
        {{ $name }} {{ $surname }}
    @endif

    <br />

    <!--
       In thise case all 'code' will go through
    -->
    {!! $name !!} {!! $surname !!}

@stop