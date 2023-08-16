<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateAccessToken
{
    var $repository;

    public function __construct()
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $token = $request->header('Authorization');
        if (empty($token)) {
            return response()->json(['error' => 'forbidden'], 403);
        }

        if ($token != env('MAIL_ACCESS_TOKEN')) {
            return response()->json(['error' => 'unauthorized'], 401);
        }

        return $next($request);
    }
}
