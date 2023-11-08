<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;

class EtudiantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
    // public function handle(Request $request, Closure $next)
    // {
    //     if (auth()->check() && auth()->user()->isEtudiant()) {
    //         // User is authenticated and is an etudiant
    //         $hashids = new Hashids('arti_form', 15);
    //         $encryptedId = $hashids->encode(auth()->user()->id_utilisateur);

    //         // Share the encrypted ID with all views
    //         view()->share('encryptedId', $encryptedId);
    //     }

    //     return $next($request);
    // }
}

