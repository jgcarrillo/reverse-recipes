<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use App\Models\Ingredient;
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
            'name' => 'Farro Salad with Asparagus and Parmesan',
            'description' => 'A light and delicious way to get your whole grains. Perfect salad for picnics, baby or bridal showers or just because!',
            'photo_url' => 'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F4500968.jpg'
        ],
        [
            'name' => 'Avocado Deviled Eggs',
            'description' => 'This is a twist on the traditional deviled egg. I usually use 1 or 2 fewer yolks for the filling.',
            'photo_url' => 'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F8782921.jpg'
        ],
        [
            'name' => 'Salmon Curry',
            'description' => 'A family favorite for salmon lovers! Serve hot with rice or roti, topped with cilantro if you like.',
            'photo_url' => 'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F9146205.jpg'
        ],
        [
            'name' => 'Creamy Pulled Pork Soup',
            'description' => 'This creamy soup can be made with leftover pulled pork.',
            'photo_url' => 'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F9146205.jpg'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = Ingredient::all();

        foreach ($this->recipes as $recipe) {
            $plucked = $collection->pluck('name')->shuffle()->take(3)->implode(', ', ", ");

            DB::table('recipes')->insert([
                'name' => $recipe['name'],
                'description' => $recipe['description'],
                'time_id' => Time::all()->random()->id,
                'difficulty_id' => Difficulty::all()->random()->id,
                'persons_id' => Persons::all()->random()->id,
                'type_id' => Type::all()->random()->id,
                'ingredients' => $plucked,
                'recipe_photo_path' => $recipe['photo_url'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
