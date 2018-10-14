<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIfAdmin
{
    /**
     * Validates if a user is an admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->isAdmin()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Sorry, you are not an admin.',
                ],
                401
            );
        }
        return $next($request);
    }
}
