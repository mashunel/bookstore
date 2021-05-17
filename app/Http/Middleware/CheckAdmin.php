<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user->isAdmin()) {
            session()->flash('warning', 'У вас нет прав администратора');
            return redirect()->route('catalog');
        }
        return $next($request);
    }
}
