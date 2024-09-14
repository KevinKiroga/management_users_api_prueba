<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetUsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id'           => $this->id,
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'date_birth'   => $this->date_birth,
            'mobile_phone' => $this->mobile_phone,
            'email'        => $this->email,
            'address'      => $this->address,
            'city_id'      => $this->city_id
        ];
    }
}
