<?php


namespace App\Http\Middleware;

use Closure;

class LevelAkses
{
    public function handle($request, Closure $next)
    {
        // cek akses
        if (auth()->check() && auth()->user()->level === 'admin') {
            return $next($request);
        }

        // redirrect
        return redirect('/tidak-diizinkan');
    }
}
