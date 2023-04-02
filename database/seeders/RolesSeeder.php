<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'rol_name' => 'administrador',
        ]);

        DB::table('roles')->insert([
            'rol_name' => 'empleado',
        ]);
    }
}
