<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Alert;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (in_array($request->user()->level,$levels)){
            return $next($request);

        }

        Alert::error('Maaf', 'Anda tidak dapat mengakses halaman ini');
        return redirect('home');
        //mun teu menang nya balik dei 
    }
}
