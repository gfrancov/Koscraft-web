<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;

    protected $connection = 'second_db';

    protected $table = 'UltimateStatistics';

    protected $primaryKey = 'id';


}
