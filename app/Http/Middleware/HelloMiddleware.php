<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($req, Closure $next)
    {
        $data = [
            ['name' => 'saburo', 'mail' => 'd@co.jp'],
            ['name' => 'sachiko', 'mail' => 'e@co.jp'],
            ['name' => 'yukiko', 'mail' => 'f@co.jp'],
        ];
        $req->merge(['data'=>$data]);
        $res = $next($req);
        $content = $res->content(); // content() -> return HTML source code.

        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="https://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);
        $res->setContent($content);
        return $res;
    }
}