<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');
Route::get('hello/request', 'RequestController@index');
Route::get('hello/single', 'SingleActionController');
Route::get('hello/other', 'HelloController@other');
Route::get('hello/{id?}/{pass?}', 'HelloController@param');

Route::get('sample', function() {
    
    $param = 'bbb';
    $html = <<<EOF
<html>
<head>
    <title>hello</title>
</head>
<body>
    <h1>AAA</h1>
    <p>{$param}</p>
</body>
</html>
EOF;

    return $html;
});