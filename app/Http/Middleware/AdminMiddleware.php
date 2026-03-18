<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Role 1 là Admin
if     (auth()->check() && auth()->user()->role == '1' ) {    
            return $next($request);
        }
        // Nếu không phải là Admin trả về lỗi
        return response()->json(['message' => 'Bạn không có quyền truy cập vào đây!'], 403);
    }
}
