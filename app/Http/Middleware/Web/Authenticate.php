<?php

namespace App\Http\Middleware\Web;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $authenticated = isset($_SERVER['PHP_AUTH_USER'])
            && $_SERVER['PHP_AUTH_USER'] === 'root'
            && Hash::check($_SERVER['PHP_AUTH_PW'], Hash::make(config('auth.password_admin')));

        if (!$authenticated) {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo '401 Unauthorized';
            exit;
        }

        return $next($request);
    }
}
