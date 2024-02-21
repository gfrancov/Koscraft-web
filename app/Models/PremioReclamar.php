<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremioReclamar extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $fillable = [
        'usuario',
        'premio'
    ];

}
