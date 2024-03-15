<?php

namespace App\Http\Middleware;

use App\metier\Visiteur;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->get('type') === 'A'){
            return $next($request);
        }
        return redirect()->route('home');
    }
}

