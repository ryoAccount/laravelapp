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

use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', 'HelloController@index')->middleware('hello');
Route::post('hello', 'HelloController@post');
Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');
Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');
Route::get('hello/show', 'HelloController@show');
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