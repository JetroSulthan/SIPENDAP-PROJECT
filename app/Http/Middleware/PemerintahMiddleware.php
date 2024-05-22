<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PemerintahMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->guest()){
            return redirect('/');
        }
        else if(auth()->user()->roles_id != 2){
            abort(403);
        }
        return $next($request);
    }
}
