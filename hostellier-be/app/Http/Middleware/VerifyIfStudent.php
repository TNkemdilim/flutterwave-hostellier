<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIfStudent
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
        if (!auth()->user()->isStudent()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Sorry, you are not a student.',
                ], 401
            );
        }
        return $next($request);
    }
}
