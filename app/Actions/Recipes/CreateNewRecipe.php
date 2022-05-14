<?php

namespace App\Actions\Recipes;

use App\Models\Recipe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewRecipe
{
    /**
     * Validate and create a newly recipe.
     *
     * @param  array  $input
     * @return \App\Models\Recipe
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'time' => ['required', 'integer'],
            'difficulty' => ['required', 'integer'],
            'persons' => ['required', 'integer'],
            'type' => ['required', 'integer'],
        ])->validate();

        return Recipe::create([
            'name' => $input['name'],
            'description' => $input['description'],
            'time_id' => $input['time'],
            'difficulty_id' => $input['difficulty'],
            'persons_id' => $input['persons'],
            'type_id' => $input['type'],
        ]);
    }
}
