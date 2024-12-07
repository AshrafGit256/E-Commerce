<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionTimeout
{
    protected $timeout = 900; // 15 minutes (in seconds)

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = Session::get('last_activity');
            if ($lastActivity && (time() - $lastActivity > $this->timeout)) {
                Auth::logout();
                Session::flush(); // Clear the session
                return redirect()->route('lockscreen')->with('warning', 'Session expired due to inactivity.');
            }
            Session::put('last_activity', time());
        }
        return $next($request);
    }
}
