<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Premios;


class PremiosController extends Controller
{
    public static function getAllPremios() {
        $premios = Premios::all();
        return $premios;
    }

    public static function getPremio($id) {
        $premio = Premios::where('id','=',$id)->first();
        return $premio;
    }

}
