<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $fillable = [
        'nombre',
        'horas',
        'cantidad',
        'imageURL'
    ];

}
