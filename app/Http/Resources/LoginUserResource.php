<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'id' => $this['user']['id'],
            'first_name' => $this['user']['first_name'],
            'last_name' => $this['user']['last_name'],
            'date_birth' => $this['user']['date_birth'],
            'email' => $this['user']['email'],
            'mobile_phone' => $this['user']['mobile_phone'],
            'password' => $this['user']['password'],
            'address' => $this['user']['address'],
            'access_token' => $this['access_token'],
            'token_type' => $this['token_type']
        ];
    }
}
