<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;
use Validator;

class HelloController extends Controller
{
    public function index(Request $req) {
        // $items = DB::select('select * from people');?
        $items = DB::table('people')->get();
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

    public function add(Request $req) {
        return view('hello.add');
    }

    public function create(Request $req) {
        $param = [
            'name' => $req->name,
            'mail' => $req->mail,
            'age' => $req->age,
        ];
        // DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $req) {
        $param = ['id' => $req->id];
        // $item = DB::select('select * from people where id = :id', $param);
        $item = DB::table('people')->where('id', $req->id)->first();
        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $req) {
        $param = [
            'name' => $req->name,
            'mail' => $req->mail,
            'age' => $req->age,
        ];
        // DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);
        DB::table('people')->where('id', $req->id)->update($param);
        return redirect('/hello');
    }

    public function show(Request $req) {
        // $item = DB::table('people')->where('id', $req->id)->first();
        // $items = DB::table('people')->where('id', '<=', $req->id)->get();
        // $items = DB::table('people')->whereRaw('id <= ? and age > 10',[$req->id])->orderBy('id', 'desc')->get();
        $items = DB::table('people')->limit(2)->get();
        return view('hello.show', ['items' => $items]);
    }

    public function getSession(Request $req) {
        $data = $req->session()->get('msg');
        return view('hello/session', ['session_data' => $data]);
    }

    public function setSession(Request $req) {
        $msg = $req->input;
        $req->session()->put('msg', $msg);
        return redirect('hello/session');
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