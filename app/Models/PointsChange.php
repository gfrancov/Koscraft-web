<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointsChange extends Model
{
    use HasFactory;

    protected $connection = 'mysql';


    protected $fillable = [
        'usuario',
        'points'
    ];
    
    

}
