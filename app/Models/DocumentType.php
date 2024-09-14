<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    /**
     * Los atributos que pueden ser asignados de forma masiva.
     */
    protected $fillable = [
        'name_document_type'
    ];

    // Desactivar timestamps.
    public $timestamps = false;

    // Un tipo de documento pertenece a muchos usuarios.
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
