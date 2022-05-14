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
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'name' => 'Coca Cola Premium',
            'description' => 'lorem lorem lorem lorem',
            'time_id' => Time::all()->random()->id,
            'difficulty_id' => Difficulty::all()->random()->id,
            'persons_id' => Persons::all()->random()->id,
            'type_id' => Type::all()->random()->id,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('recipes')->insert([
            'name' => 'Clear Coffe',
            'description' => 'lorem lorem lorem lorem',
            'time_id' => Time::all()->random()->id,
            'difficulty_id' => Difficulty::all()->random()->id,
            'persons_id' => Persons::all()->random()->id,
            'type_id' => Type::all()->random()->id,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('recipes')->insert([
            'name' => 'Awesome Bowl',
            'description' => 'lorem lorem lorem lorem',
            'time_id' => Time::all()->random()->id,
            'difficulty_id' => Difficulty::all()->random()->id,
            'persons_id' => Persons::all()->random()->id,
            'type_id' => Type::all()->random()->id,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('recipes')->insert([
            'name' => 'Migas Realfood',
            'description' => 'lorem lorem lorem lorem',
            'time_id' => Time::all()->random()->id,
            'difficulty_id' => Difficulty::all()->random()->id,
            'persons_id' => Persons::all()->random()->id,
            'type_id' => Type::all()->random()->id,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
