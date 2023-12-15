<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        // if (auth()->user()->role == 0) {
        //     return $next($request);
        // }


        // protected routes

        // $protectedRoutes = [
        //     'dashboard',
        //     'dashboard-user',
        //     'dashboard-items',
        //     'dashboard-items/cari',
        //     'dashboard-category',
        //     'dashboard-orders',
        //     'dashboard-penalty',
        //     'add/user',
        //     'delete',
        //     'update/user/*',
        //     'add/items',
        //     'update/item/*',
        //     'deleteitem',
        //     'add/order',
        //     'update_order/*',
        //     'add/category',
        //     'delete/category',
        // ];

        // $currentRoute = $request->route()->getName();

        // if (in_array($currentRoute, $protectedRoutes) && Auth::user()->role != 0) {
        //     return redirect('/')->with('error', 'Unauthorized access');
        // }

        return $next($request);
    }
}
