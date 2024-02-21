<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Points;
use App\Models\PointsChange;


class PointsController extends Controller
{
    public static function todosCanjeos() {
        $todosCanjeos = Points::all();
        return $todosCanjeos;
    }

    public static function getCanjeosUsuario($idUsuario) {
        $canjeosUsuario = PointsChange::where('usuario','=',$idUsuario)->get();
        return $canjeosUsuario;
    }

    public static function getDatosCanjeo($idCanjeo) {
        $canjeo = Points::where('id', '=', $idCanjeo)->first();
        return $canjeo;
    }

    public static function premioReclamado($idUsuario, $idCanjeo) {
        PointsChange::create(['usuario' => $idUsuario, 'points' => $idCanjeo]);
    }

    public static function ultimoCanjeoHecho($idUsuario, $idCanjeo) {
        $ultimoCanjeo = PointsChange::where('usuario','=',$idUsuario)->where('points','=',$idCanjeo)->orderBy('created_at', 'DESC')->first();
        return $ultimoCanjeo;
    }

}
