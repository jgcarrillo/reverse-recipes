<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    protected $type = [
        'Appetizers and Snacks',
        'Bread Recipes',
        'Breakfast and Brunch',
        'Desserts',
        'Dinner Recipes',
        'Drinks',
        'Everyday Cooking',
        'Holiday and Events',
        'Lunch Recipes'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->type as $tp) {
            DB::table('type')->insert([
                'type' => $tp,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
