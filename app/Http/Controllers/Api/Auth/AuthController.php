<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\LoginUserResource;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    /**
     * Metodo para autenticar un usuario
     */
    public function login(LoginRequest $request): JsonResponse
    {
        // Almacenar en una variable las credenciales obtenidas en el request
        $credentials = $request->only('mobile_phone', 'password');

        try {
            // Validar si no existe el usuario con el token JWTAuth
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales invalidas'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'No tiene el token'], 500);
        }

        // Almacenar en un array los datos del usuario autenticado
        $data = [
            'user' => auth()->user(),
            'access_token' => $token,
            'token_type' => 'Bearer'
        ];

        //  Retornar una colleccion con los datos del usuario autenticado | 200
        return response()->json(new LoginUserResource($data), 200);
    }
}
