<?php

namespace App\Http\Middleware;

use Closure;

class Actor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check()) {
            if(auth()->user()->role === 'actor'){
                return $next($request);
            }
        }
        abort(403, '管理者権限がありません。');
    }
}
