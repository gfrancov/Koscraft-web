<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premios extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $fillable = [
        'titulo',
        'precio',
        'descripcion',
        'imageURL',
        'permisoLP'
    ];

}
