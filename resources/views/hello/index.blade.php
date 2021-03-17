@extends('layouts.helloapp')
@section('title', 'Index')

@section('menubar')
    @parent
    Index Page
@endsection

@section('content')
    <p>Main Contents</p>

    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/hello" method="post">
        <table>
            @csrf
            @if ($errors->has('name'))
            <tr>
                <th>
                    ERROR
                </th>
                <td>
                    {{$errors->first('name')}}
                </td>
            </tr>
            @endif
            <tr>
                <th>
                    name:
                </th>
                <td>
                    <input type="text" name="name" value="{{old('name')}}">
                </td>
            </tr>

            @if ($errors->has('mail'))
            <tr>
                <th>
                    ERROR
                </th>
                <td>
                    {{$errors->first('mail')}}
                </td>
            </tr>
            @endif
            <tr>
                <th>
                    mail:
                </th>
                <td>
                    <input type="text" name="mail" value="{{old('mail')}}">
                </td>
            </tr>

            @if ($errors->has('age'))
            <tr>
                <th>
                    ERROR
                </th>
                <td>
                    {{$errors->first('age')}}
                </td>
            </tr>
            @endif
            <tr>
                <th>
                    age:
                </th>
                <td>
                    <input type="text" name="age" value="{{old('age')}}">
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

    <p>Controller value 'message' = {{$message}}</p>
    <p>ViewComposer value 'view_message' = {{$view_message}}</p>

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