<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;
use Validator;

class HelloController extends Controller
{
    public function index(Request $req) {
        $items = DB::select('select * from people');
        if($req->hasCookie('msg')) {
            $msg = 'Cookie: ' . $req->cookie('msg');
        } else {
            $msg = 'No Cookie';
        }
        return view('hello.index', ['msg'=>$msg, 'items' => $items]);
    }

    public function post(Request $req) {
        $validate_rule = ['msg' => 'required'];
        $this->validate($req, $validate_rule);
        $msg = $req->msg;
        $res = response()->view('hello.index', ['msg' => 'Cookie: ' . $msg]);
        $res->cookie('msg', $msg, 100);
        return $res;
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