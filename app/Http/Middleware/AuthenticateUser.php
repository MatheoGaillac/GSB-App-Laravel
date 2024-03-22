<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('id') === 0){
            return redirect('/getLogin'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        }

        return $next($request);
    }
}
