<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Points;


class PointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        $arrPoints = [
            [
                'nombre' => '10 PUNTOS',
                'horas' => 1,
                'cantidad' => 10,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
            [
                'nombre' => '15 PUNTOS',
                'horas' => 2,
                'cantidad' => 15,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
            [
                'nombre' => '20 PUNTOS',
                'horas' => 3,
                'cantidad' => 20,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
            [
                'nombre' => '25 PUNTOS',
                'horas' => 4,
                'cantidad' => 25,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
            [
                'nombre' => '30 PUNTOS',
                'horas' => 5,
                'cantidad' => 30,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
            [
                'nombre' => '45 PUNTOS',
                'horas' => 6,
                'cantidad' => 45,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
            [
                'nombre' => '50 PUNTOS',
                'horas' => 7,
                'cantidad' => 50,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
            [
                'nombre' => '55 PUNTOS',
                'horas' => 8,
                'cantidad' => 55,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
            [
                'nombre' => '60 PUNTOS',
                'horas' => 9,
                'cantidad' => 60,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
            [
                'nombre' => '65 PUNTOS',
                'horas' => 10,
                'cantidad' => 65,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
            [
                'nombre' => '70 PUNTOS',
                'horas' => 11,
                'cantidad' => 70,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
            [
                'nombre' => '80 PUNTOS',
                'horas' => 12,
                'cantidad' => 80,
                'imageURL' => '/img/monedas/Monedas.png',   
            ],
        ];
        

        foreach($arrPoints as $points) {
            Points::create($points);
        }

    }
}
