<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $req) {
        return view('hello.index', ['id'=>$req->id, 'data'=>$req->data, 'message'=>'Hello Validator']);
    }

    public function post(HelloRequest $req) {
        $msg = $req -> msg;
        return view('hello.index', ['msg' => $msg, 'id' => $req -> id, 'message'=>'validate OK!']);
    }

    public function param($id='noname', $pass='unknown') {
        return <<<EOF
            <html>
            <head>
                <title>hello/index</title>
            </head>
            <body>
                <h1>index</h1>
                <p>HelloController</p>
                <p>{$id}</p>
                <p>{$pass}</p>
            </body>
            </html>
EOF;
    }

    public function other() {
        return <<<EOF
            <html>
            <head>
                <title>hello/index</title>
            </head>
            <body>
                <h1>other</h1>
                <p>HelloController</p>
                <p>other</p>
            </body>
            </html>
EOF;
    }
}