<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {        
        header('Accept: application/json');
        if ($request->header('token', false) !== 'key_cur_prod_fnPqT5xQEi5Vcb9wKwbCf65c3BjVGyBB') {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized access',
            ], 401);
        }

        return $next($request);
    }
}
