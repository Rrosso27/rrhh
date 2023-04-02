<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activities')->insert([
            'activity_name' => "Añadir usuarios",
            'url'=> "/crearUsuarios",
            'rol_id'=> "1"
        ]);
    }
}
