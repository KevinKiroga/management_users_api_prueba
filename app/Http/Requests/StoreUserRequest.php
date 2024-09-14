<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determinar si el usuario esta autorizado a enviar este formulario.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para crear un usuario.
     */
    public function rules(): array
    {
        return [
            'first_name'   => 'required|string',
            'last_name'    => 'required|string',
            'date_birth'   => 'required|date',
            'address'      => 'required|string',
            'mobile_phone' => 'required|string|max:10|unique:users',
            'email'        => 'required|string|max:100|unique:users|email',
            'password'     => 'required|string',
        ];
    }
}
