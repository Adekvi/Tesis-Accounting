<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleGate
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('landing.auth.login')
                ->with('error', 'Anda harus login sebagai Super Admin.');
        }

        $user = Auth::user();

        $isSuperAdmin = ($user->role ?? null) === 'super_admin'
            || ($user->is_super_admin ?? false) === true;

        if (! $isSuperAdmin) {
            abort(403, 'Area ini khusus Super Admin.');
        }

        return $next($request);
    }
}
