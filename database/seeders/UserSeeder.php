<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  Hash, DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'nicolasRosso',
            'first_name'=> 'nicolas',
            'last_name' => 'Rosso',
            'email' => 'nicolasx1625@gmail.com',
            'password' =>  Hash::make('12345678'),
            'roles_id' => 1
        ]);
    }
}
