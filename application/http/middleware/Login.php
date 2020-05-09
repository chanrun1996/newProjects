<?php

namespace app\http\middleware;

class Login
{
    public function handle($request, \Closure $next)
    {
        echo  111;
        return $next($request);
    }
}
