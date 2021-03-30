<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $req) {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    public function find(Request $req) {
        return view('person.find', ['input' => '']);
    }

    public function search(Request $req) {
        $item = Person::find($req->input);
        $param = ['input' => $req->input, 'item' => $item];
        return view('person.find', $param);
    }
}
