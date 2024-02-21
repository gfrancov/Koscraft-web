<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Premios;

class PremiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        $arrPremios = [
            [
                'titulo' => 'RECOMPENSA 1',
                'precio' => 150,
                'descripcion' => 'Premio mu xulo',
                'imageURL' => '/img/prestigios/PrestigioDiamante.png',
                'permisoLP' => 'koscraft.recompensaweb.uno'
            ]
        ];
        

        foreach($arrPremios as $premio) {
            Premios::create($premio);
        }

    }
}
