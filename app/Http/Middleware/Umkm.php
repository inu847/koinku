<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Umkm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::guard('umkm')->check() == true) {
            if ($request->route()->uri == 'umkm/login' or $request->route()->uri == 'umkm/register') {
                return redirect()->back();
            }else{
                return $next($request);
            }
        }else {
            return $next($request);
        }
    }
}
