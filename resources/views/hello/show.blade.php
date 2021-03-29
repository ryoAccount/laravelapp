@extends('layouts.helloapp')

@section('title', 'Show')

@section('content')
    @if ($items != null)
        @foreach ($items as $item)
            <table>
                <tr>
                    <th>id: </th>
                    <td>
                        {{$item->id}}
                    </td>
                </tr>
                <tr>
                    <th>name: </th>
                    <td>
                        {{$item->name}}
                    </td>
                </tr>
                <tr>
                    <th>mail: </th>
                    <td>
                        {{$item->mail}}
                    </td>
                </tr>
                <tr>
                    <th>age: </th>
                    <td>
                        {{$item->age}}
                    </td>
                </tr>
            </table>
        @endforeach
    @endif
@endsection
