<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material = new Material();
        $material->id = 1;
        $material->name = "STERLING SILVER";
        $material->save();
        $material = new Material();
        $material->id = 2;
        $material->name = "WHITE GOLD";
        $material->save();
    }
}
