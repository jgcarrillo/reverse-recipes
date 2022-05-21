<?php

namespace App\Actions\Recipes;

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
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validate();

        /*
        if (isset($input['photo'])) {
            // Actualizar foto y borrar la anterior
        }
        */

        $recipe->forceFill([
            'name' => $input['name'],
            'description' => $input['description'],
            'time_id' => $input['time'],
            'difficulty_id' => $input['difficulty'],
            'persons_id' => $input['persons'],
            'type_id' => $input['type'],
        ])->save();
    }
}
