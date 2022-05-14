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
            'time' => ['required', 'string', 'max:255'],
            'difficulty' => ['required', 'string', 'max:255'],
            'persons' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
        ])->validate();

        return Recipe::create([
            'name' => $input['name'],
            'description' => $input['description'],
            'time' => $input['time'],
            'difficulty' => $input['difficulty'],
            'persons' => $input['persons'],
            'type' => $input['type'],
        ]);
    }
}
