<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;

    protected $connection = 'third_db';

    protected $table = 'luckperms_user_permissions';

    protected $primaryKey = 'uuid';
}
