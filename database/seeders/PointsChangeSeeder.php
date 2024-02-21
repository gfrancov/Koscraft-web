<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PointsChange;


class PointsChangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        $arrPoints = [
            [
                'usuario' => 1,
                'points' => 1,
                'created_at' => '2024-02-15 15:58:24'
            ],
            [
                'usuario' => 1,
                'points' => 2,
                'created_at' => '2024-02-20 15:58:24'
            ]
        ];
        

        foreach($arrPoints as $points) {
            PointsChange::create($points);
        }

    }


}
