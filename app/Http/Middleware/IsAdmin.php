<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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

        // cek authentikasi
        // cek apakah dia login atau tidak, lalu cek roles nya
        if (Auth::user() && Auth::user()->roles == 'ADMIN') {
            // lanjutkan ke request selanjutnya
            return $next($request);
        }

        // selain itu, arahkan ke halaman utama
        return redirect('/');
    }
}
