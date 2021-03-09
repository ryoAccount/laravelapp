<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $req) {
        $data = [
            ['name' => 'taro', 'mail' => 'a@co.jp'],
            ['name' => 'hanako', 'mail' => 'b@co.jp'],
            ['name' => 'jiro', 'mail' => 'c@co.jp'],
        ];
        return view('hello.index', ['id'=>$req->id, 'data'=>$data, 'message'=>'Hello! message']);
    }

    public function post(Request $req) {
        $msg = $req -> msg;
        return view('hello.index', ['msg' => $msg, 'id' => $req -> id]);
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