<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */



    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // L'utilisateur est connecté, continuez la requête
            $statut = User::find(Auth::user()->id);
            $statut = $statut->bloque;
            if ($statut == 0) {
                return $next($request);
            } else {
                return redirect('/SR PADME - Connexion')->withInput()->withErrors(['login' => 'Vous etes bloqué pour le moment !']);
            }
        } else {
            // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
            return redirect('/SR PADME - Connexion');
        }
    }
}
