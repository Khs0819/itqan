<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }

        // Check if user is admin (role field or is_admin field)
        if (auth()->user()->role !== 'admin' && !auth()->user()->is_admin) {
            abort(403, 'غير مصرح لك بالوصول');
        }

        return $next($request);
    }
}
