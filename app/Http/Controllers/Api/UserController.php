<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\GetUserResource;
use App\Http\Resources\GetUsersResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Listar todos los usuarios
     */
    public function index(): JsonResponse
    {
        try {
            $users = User::all();
            return response()->json(GetUsersResource::collection($users), 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Ocurrio un error'], 500);
        }
    }

    /**
     * Guardar un nuevo usuario
     */
    public function store(StoreUserRequest $request)
    {
        try {
            // Crear un nuevo usuario
            $user = User::create([
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'date_birth'   => $request->date_birth,
                'address'      => $request->address,
                'mobile_phone' => $request->mobile_phone,
                'email'        => $request->email,
                'password'     => Hash::make($request->password),
            ]);
            return response()->json(UserResource::make($user), 201);
        } catch (ValidationException $e) {
            return response()->json($e->errors(), 422);
        }
    }

    /**
     * Mostrar el usuario por id
     */
    public function show($id): JsonResponse
    {
        try {
            $user = User::findOrFail($id);
            return response()->json(GetUserResource::make($user), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // Actualizar el usuario
            $user->update([
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'date_birth'   => $request->date_birth,
                'address'      => $request->address,
                'mobile_phone' => $request->mobile_phone,
                'email'        => $request->email,
                'password'     => Hash::make($request->password),
            ]);
            return response()->json(UserResource::make($user), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }


    /**
     * Eliminar el usuario por id
     */
    public function destroy($id): JsonResponse
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(UserResource::make($user), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }
}
