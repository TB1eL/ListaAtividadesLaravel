<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Verifica se o usuário está logado e se a role dele bate com a exigida na rota
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }

        abort(403, 'Acesso negado. Você não tem permissão para acessar esta página.');
    }
}