<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determinar si el usuario esta autorizado a enviar este formulario.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para actualizar un usuario.
     *
     * 
     */
    public function rules(): array
    {
        // Validaciones para actualizar un usuario
        return [
            'first_name'   => 'required|string',
            'last_name'    => 'required|string',
            'date_birth'   => 'required|date',
            'address'      => 'required|string',
            'mobile_phone' => 'required|string|max:10|unique:users,mobile_phone,' . $this->route('user'),
            'email'        => 'required|string|max:100|email|unique:users,email,' . $this->route('user'),
            'password'     => 'required|string',
        ];
    }
}
