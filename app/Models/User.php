<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     *  Los atributos que pueden ser asignados de forma masiva.
     *
     *
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'date_birth',
        'address',
        'city_id',
        'document_type_id',
        'document_number',
        'mobile_phone',
        'email',
        'password',
    ];

    // Desactivar timestamps.
    public $timestamps = false;

    /**
     * Los atributos ocultos.
     *
     *
     */
    protected $hidden = [
        'password'
    ];

    // Un usuario pertenece a una ciudad.
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    // Un usuario puede un tipo de documento.
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id');
    }


    // Obtiene el identificador unico JWT del usuario.
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // Almacena las credenciales de JWT del usuario.
    public function getJWTCustomClaims()
    {
        return [];
    }
}
