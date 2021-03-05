<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequestController extends Controller
{
    public function index(Request $req, Response $res) {
        $url = $req->url();
        $fullurl = $req->fullUrl();
        $path = $req->path();
        $status = $res->status();
        $content = $res->content();

        $html = <<<EOF
            <html>
            <head>
                <title>hello/index</title>
            </head>
            <body>
                <h1>request</h1>
                <pre>{$req}</pre>
                <h1>response</h1>
                <pre>{$res}</pre>
                <h1>method</h1>
                <pre>{$url}</pre>
                <pre>{$fullurl}</pre>
                <pre>{$path}</pre>
                <pre>{$status}</pre>
                <pre>{$content}</pre>
            </body>
            </html>
EOF;
        $res->setContent($html);
        return $res;
    }
}