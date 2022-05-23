<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsSeeder extends Seeder
{
    protected $ingredients = [
        'Tomato',
        'Spaguetti',
        'Nata',
        'Orange',
        'Apple',
        'Mostaza',
        'Ketchup',
        'Oil',
        'Salt',
        'Ron'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->ingredients as $ingredient) {
            DB::table('ingredients')->insert([
                'name' => $ingredient,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
