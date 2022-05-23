<?php

namespace App\Actions\Recipes;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UpdateRecipeInformation
{
    /**
     * Validate and update the given recipe's information.
     *
     * @param  mixed  $recipe
     * @param  array  $input
     * @return void
     */
    public function update($recipe, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'time' => ['required', 'integer'],
            'difficulty' => ['required', 'integer'],
            'persons' => ['required', 'integer'],
            'type' => ['required', 'integer'],
            'ingredients' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validate();

        if(isset($input['photo'])) {
            $destination_path = 'public/images/recipes';

            $image = $input['photo'];
            $image_name = $image->getClientOriginalName();

            if(File::exists($destination_path . $image_name)) {
                File::delete($destination_path . $image_name);
            }

            $path = $input['photo']->storeAs($destination_path, $image_name);

            $recipe->forceFill([
                'recipe_photo_path' => url('storage/images/recipes/' . $input['photo']->getClientOriginalName())  ?? null,
            ])->save();
        }

        $recipe->forceFill([
            'name' => $input['name'],
            'description' => $input['description'],
            'time_id' => $input['time'],
            'difficulty_id' => $input['difficulty'],
            'persons_id' => $input['persons'],
            'type_id' => $input['type'],
            'ingredients' => $input['ingredients']
        ])->save();
    }
}
