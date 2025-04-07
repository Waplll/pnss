<?php
namespace App\Middlewares;

use Src\Auth\Auth;
use Src\Request;

class RoleMiddleware
{
    public function handle(Request $request, string $role)
    {
        $user = Auth::user();
        if (!$user || $user->role !== $role) {
            app()->route->redirect('/');
        }
    }
}