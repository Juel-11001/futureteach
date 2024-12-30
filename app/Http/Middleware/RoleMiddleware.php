<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // // Redirect unauthenticated users to the login page
        if (!$request->user()) {
            return redirect('login');
        }
        // $user = Auth::user();

        // if (!$user || !in_array($user->role, $roles)) {
        //     return redirect()->route('forbidden'); // Redirect or abort
        // }
        $user = Auth::user();

        // If the user is not authenticated or their role isn't allowed
        if (!$user || !in_array($user->role, $roles)) {
            return $this->redirectToDashboard($user); // Redirect based on role
        }
        return $next($request);
    }
    protected function redirectToDashboard($user)
    {
        // Redirect based on user role
        return match ($user->role) {
            'super_admin', 'admin' => redirect()->route('admin.dashboard'),
            'user' => redirect()->route('user.dashboard'),
            default => redirect()->route('login'),
        };
    }
}
