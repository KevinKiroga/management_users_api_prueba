<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            // Autenticar el token
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {

            // Si el token no es valido
            if ($e instanceof TokenInvalidException) {
                return response()->json(['message' => 'Token Invalido',], 401);
            }

            // Si el token expiro
            if ($e instanceof TokenExpiredException) {
                return response()->json(['message' => 'Token expirado',], 401);
            }

            // Si todo lo anterior no se cumple entonces el token no se encuentra
            return response()->json(['message' => 'Token no encontrado',], 401);
        }

        return $next($request);
    }
}
