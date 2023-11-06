<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAccess
{
    public function handle(Request $request, Closure $next,$role)
    {
        if(auth()->user()->role==$role)
        {
            return $next($request);
        }
        if ($request->isXmlHttpRequest() || $request->ajax())
        {
            return failure_response([],[],'Access Denied');
        }
        return redirect('login');
    }
}
