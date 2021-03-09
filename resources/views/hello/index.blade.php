@extends('layouts.helloapp')
@section('title', 'Index')

@section('menubar')
    @parent
    Index Page
@endsection

@section('content')
    <p>Main Contents</p>
    <p>Controller value 'message' = {{$message}}</p>
    <p>ViewComposer value 'view_message' = {{$view_message}}</p>

    <ul>
        @each('components.item', $data, 'item')
    </ul>

    @component('components.message')
        @slot('title')
        CAUTION!
        @endslot

        @slot('content')
        Contents
        @endslot
    @endcomponent

    <hr>

    @include('components.message', ['title'=>'OK', 'content'=>'Sub View'])
@endsection

@section('footer')
    copyright.
@endsection