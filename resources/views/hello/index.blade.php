@extends('layouts.helloapp')
@section('title', 'Index')

@section('menubar')
    @parent
    Index Page
@endsection

@section('content')
    <p>Main Contents</p>

    <table>
        <tr>
            <th><a href="/hello?sort=name">Name</a></th>
            <th><a href="/hello?sort=mail">Mail</a></th>
            <th><a href="/hello?sort=age">Age</a></th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->mail}}</td>
                <td>{{$item->age}}</td>
            </tr>
        @endforeach
    </table>
    {{$items->appends(['sort' => $sort])->links()}}

    <p>{{$msg}}</p>

    @if (count($errors) > 0)
    <p>Validate error!</p>
    @endif

    <form action="/hello" method="post">
        <table>
            @csrf
            @if ($errors->has('msg'))
            <tr>
                <th>
                    ERROR
                </th>
                <td>
                    {{$errors->first('msg')}}
                </td>
            </tr>
            @endif
            <tr>
                <th>
                    Message:
                </th>
                <td>
                    <input type="text" name="msg" value="{{old('msg')}}">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="send">
                </td>
            </tr>
        </table>
    </form>

    <p><middleware>google.com</middleware> to link.</p>
    <p><middleware>yahoo.co.jp</middleware> to link.</p>
    <p><middleware>bing.com</middleware> to link.</p>

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