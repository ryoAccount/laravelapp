<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $req) {
        $validator = Validator::make($req->query(), [
            'id' => 'required',
            'pw' => 'required',
        ]);
        if($validator->fails()) {
            $msg = 'NG!';
        } else {
            $msg = 'OK!';
        }
        return view('hello.index', ['id'=>$req->id, 'data'=>$req->data, 'message'=>$msg]);
    }

    public function post(Request $req) {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
            'url' => 'active_url',
            'alpha' => 'alpha-num',
        ], [
            'name.required' => 'name!!',
            'mail.email' => 'email!!',
            'age.numeric' => 'numeric!!',
            'age.min' => 'min!!',
            'age.max' => 'max!!',
            'url.active_url' => 'active_url!!',
            'alpha.alpha_num' => 'alpha-num!!',
        ]);
        $validator->sometimes('age', 'min:0', function($input) {
            return is_numeric($input->age);
        });
        $validator->sometimes('age', 'max:200', function($input) {
            return is_numeric($input->age);
        });
        if($validator->fails()) {
            return redirect('/hello')->withErrors($validator)->withInput();
        }
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