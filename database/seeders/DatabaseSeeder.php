<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DifficultySeeder::class,
            TimeSeeder::class,
            PersonsSeeder::class,
            TypeSeeder::class,
            RecipeSeeder::class,
            UserSeeder::class
        ]);
    }
}
