<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Closure;
use Carbon\Carbon;


class CheckAge
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

        $edad = Carbon::createFromDate(\Auth::user()->birthday)->age;
        dump('tienes ' . $edad . ' años');
        if ($edad <= 18) {
            dump('eres menor de edad, no puedes entrar ...');
            return redirect('home');
        }
        dump('eres mayor de edad, puedes entrar :D');
        return $next($request);

    }
}
