<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Poblar las tablas de la base de datos
     */
    public function run(): void
    {
        $this->call([UserSeeder::class]);
    }
}
