<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $fillable = [
        'imageURL',
        'titulo',
        'contenido',
        'author'
    ];
}
