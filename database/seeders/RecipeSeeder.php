<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use App\Models\Persons;
use App\Models\Time;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    protected $recipes = [
        [
            'name' => 'Coca Cola Premium',
            'description' => 'Lorem lorem lorem lorem',
        ],
        [
            'name' => 'Clear Coffe',
            'description' => 'Lorem lorem lorem lorem',
        ],
        [
            'name' => 'Awesome Bowl',
            'description' => 'Lorem lorem lorem lorem',
        ],
        [
            'name' => 'Migas Realfood',
            'description' => 'Lorem lorem lorem lorem',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->recipes as $recipe) {
            DB::table('recipes')->insert([
                'name' => $recipe['name'],
                'description' => $recipe['description'],
                'time_id' => Time::all()->random()->id,
                'difficulty_id' => Difficulty::all()->random()->id,
                'persons_id' => Persons::all()->random()->id,
                'type_id' => Type::all()->random()->id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
