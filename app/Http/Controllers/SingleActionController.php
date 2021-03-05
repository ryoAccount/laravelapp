<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleActionController extends Controller
{
    public function __invoke(){
        return <<<EOF
            <html>
            <head>
                <title>hello/index</title>
            </head>
            <body>
                <h1>invoke</h1>
                <p>SingleActionController</p>
                <p>SingleActionController</p>
            </body>
            </html>
EOF;
    }
}