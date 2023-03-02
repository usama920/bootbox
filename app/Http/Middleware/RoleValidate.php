<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleValidate
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user()->roles_id == $role){
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
    }
}
