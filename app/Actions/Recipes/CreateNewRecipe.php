<?php

namespace App\Actions\Recipes;

use App\Models\Recipe;
use Illuminate\Support\Facades\Validator;

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
            'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validate();

        if(isset($input['photo'])) {
            $destination_path = 'public/images/recipes';
            $image = $input['photo'];
            $image_name = $image->getClientOriginalName();
            $path = $input['photo']->storeAs($destination_path, $image_name);
        }

        return Recipe::create([
            'name' => $input['name'],
            'description' => $input['description'],
            'time_id' => $input['time'],
            'difficulty_id' => $input['difficulty'],
            'persons_id' => $input['persons'],
            'type_id' => $input['type'],
            'recipe_photo_path' => url('storage/images/recipes/' . $input['photo']->getClientOriginalName())  ?? null,
        ]);
    }
}
