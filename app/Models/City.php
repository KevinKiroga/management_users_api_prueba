<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * Los atributos que pueden ser asignados de forma masiva.
     */
    protected $fillable = [
        'name'
    ];

    // Una ciudad puede pertenecer a muchos usuarios.
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
