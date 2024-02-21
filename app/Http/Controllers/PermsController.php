<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perms;
use App\Models\Permissions;


class PermsController extends Controller
{
    public static function getRank($uuid) {
        $getUser = Perms::where('uuid', '=',$uuid)->first();
        
        if($getUser == null) {
            return 'default';
        } else {
            return $getUser->primary_group;
        }
    }

    public static function insertPermission($uuid, $permission) {

        Permissions::insert(
            [
                'uuid' => $uuid,
                'permission' => $permission,
                'value' => 1,
                'server' => 'global',
                'world' => 'global',
                'expiry' => 0,
                'contexts' => '{}'
            ],
        );

    }

    public static function comprovarPermission($uuid, $permission) {

        $result = Permissions::where('uuid','=',$uuid)->where('permission','=',$permission)->first();
        return $result;

    }

}
