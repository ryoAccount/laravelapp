@extends('layouts.helloapp')
@section('title', 'Index')

@section('menubar')
    @parent
    Index Page
@endsection

@section('content')
    <p>Main Contents</p>

    @if (count($errors) > 0)
    <p>Validate error!</p>
    @endif

    <form action="/hello" method="post">
        <table>
            @csrf
            @error('name')
            <tr>
                <th>
                    ERROR
                </th>
                <td>
                    {{$message}}
                </td>
            </tr>
            @enderror
            <tr>
                <th>
                    name:
                </th>
                <td>
                    <input type="text" name="name" value="{{old('name')}}">
                </td>
            </tr>

            @error('mail')
            <tr>
                <th>
                    ERROR
                </th>
                <td>
                    {{$message}}
                </td>
            </tr>
            @enderror
            <tr>
                <th>
                    mail:
                </th>
                <td>
                    <input type="text" name="mail" value="{{old('mail')}}">
                </td>
            </tr>

            @error('age')
            <tr>
                <th>
                    ERROR
                </th>
                <td>
                    {{$message}}
                </td>
            </tr>
            @enderror
            <tr>
                <th>
                    age:
                </th>
                <td>
                    <input type="text" name="age" value="{{old('age')}}">
                </td>
            </tr>

            @error('url')
            <tr>
                <th>
                    ERROR
                </th>
                <td>
                    {{$message}}
                </td>
            </tr>
            @enderror
            <tr>
                <th>
                    url:
                </th>
                <td>
                    <input type="text" name="url" value="{{old('url')}}">
                </td>
            </tr>

            @error('alpha')
            <tr>
                <th>
                    ERROR
                </th>
                <td>
                    {{$message}}
                </td>
            </tr>
            @enderror
            <tr>
                <th>
                    alpha:
                </th>
                <td>
                    <input type="text" name="alpha" value="{{old('alpha')}}">
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