@extends('layouts.helloapp')

@section('title', 'Auth')

@section('content')
    <p>{{$msg}}</p>
    <form action="/hello/auth" method="post">
        <table>
            @csrf
            <tr>
                <th>email: </th>
                <td>
                    <input type="text" name="email">
                </td>
            </tr>
            <tr>
                <th>password: </th>
                <td>
                    <input type="text" name="password">
                </td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
    </form>