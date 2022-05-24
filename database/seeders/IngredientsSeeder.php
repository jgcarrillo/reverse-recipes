<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsSeeder extends Seeder
{
    protected $ingredients = [
        'Tomato',
        'Pasta',
        'Cream',
        'Orange',
        'Apple',
        'Mustard',
        'Ketchup',
        'Oil',
        'Salt',
        'Watermelon',
        'Mango',
        'Olives',
        'Lemon',
        'Onion',
        'Spinach',
        'Mushroom',
        'Lettuce',
        'Zucchini',
        'Garlic',
        'Carrot',
        'Avocado',
        'Potatoes',
        'Beef',
        'Turkey',
        'Chicken',
        'Crab',
        'Ham',
        'Bacon',
        'Flour',
        'Almonds',
        'Shrimp',
        'Tuna',
        'Salmon',
        'Squid',
        'Fish',
        'Anchovies'
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
