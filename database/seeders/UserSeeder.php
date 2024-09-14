<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'first_name'   => 'Prueba1',
                'last_name'    => 'Prueba1',
                'date_birth'   => '1990-01-01',
                'address'      => 'Bariro1',
                'mobile_phone' => '1',
                'email'        => 'prueba1@prueba1.com',
                'password'     => Hash::make('password1'),
            ],
            [
                'first_name'   => 'Prueba2',
                'last_name'    => 'Prueba2',
                'date_birth'   => '1990-01-01',
                'address'      => 'Bariro2',
                'mobile_phone' => '2',
                'email'        => 'prueba2@prueba2.com',
                'password'     => Hash::make('password2'),
            ],
            [
                'first_name'   => 'Prueba3',
                'last_name'    => 'Prueba3',
                'date_birth'   => '1990-01-01',
                'address'      => 'Bariro3',
                'mobile_phone' => '3',
                'email'        => 'prueba3@prueba3.com',
                'password'     => Hash::make('password3'),
            ]
        ];

        DB::table('users')->insert($data);
    }
}
