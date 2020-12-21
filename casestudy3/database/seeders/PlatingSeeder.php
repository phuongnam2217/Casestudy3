<?php

namespace Database\Seeders;

use App\Models\Plating;
use Illuminate\Database\Seeder;

class PlatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plating = new Plating();
        $plating->id = 1;
        $plating->name = "WHITE GOLD";
        $plating->save();
        $plating = new Plating();
        $plating->id = 2;
        $plating->name = "ROSE GOLD";
        $plating->save();
    }
}
