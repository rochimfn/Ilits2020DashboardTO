<?php

namespace App\Http\Middleware;

use Closure;

class CekStatusPeserta
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
        if($request->session()->get('role')=='peserta'){
            return $next($request);
        }
        return redirect('/dashboard');
    }
}
