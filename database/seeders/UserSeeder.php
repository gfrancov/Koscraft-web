<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        $arrUsers = [
            [
                'nickname' => 'rojoCaotico',
                'uuid' => 'bd623d18-bb88-3719-baa9-979c06de76dc',
                'token' => null,
                'points' => 1
            ]
        ];
        

        foreach($arrUsers as $user) {
            User::insert($user);
        }

    }

}
