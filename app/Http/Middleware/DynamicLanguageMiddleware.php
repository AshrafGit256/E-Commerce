<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class DynamicLanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        // Detect the language from query parameter or session
        $lang = $request->query('lang', Session::get('lang', 'en'));
        Session::put('lang', $lang); // Store language in session

        return $next($request);
    }
}
