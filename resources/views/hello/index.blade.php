<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blade/index</title>
</head>
<body>
    <h1>blade/index</h1>
    @isset ($msg)
        <p>{{$msg}}</p>
    @else
        <p>ZZZ</p>
    @endisset

    @foreach ([1,2,3,4,5] as $item)
        <p>index {{$loop->index}}</p>
        <p>iteration {{$loop->iteration}}</p>
        <p>remaining {{$loop->remaining}}</p>
        <p>count {{$loop->count}}</p>
        <p>first {{$loop->first}}</p>
        <p>last {{$loop->last}}</p>
        <br><br>
    @endforeach

    <p>{{$id}}</p>
    <form action="/hello" method="POST">
        @csrf
        <input type="text" name="msg">
        <input type="submit" value="button">
    </form>
</body>
</html>