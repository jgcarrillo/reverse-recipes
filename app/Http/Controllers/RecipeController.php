<?php

namespace App\Http\Controllers;

use App\Actions\Recipes\CreateNewRecipe;
use App\Actions\Recipes\UpdateRecipeInformation;
use App\Models\Difficulty;
use App\Models\Persons;
use App\Models\Recipe;
use App\Models\Time;
use App\Models\Type;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;

class RecipeController extends Controller
{
    /** USING TINKER
     * In terminal: php artisan tinker
     * use a Model: use App\Models\User
     * get user: $user = User::find(4)
     * get data: $user->recipes()->get()
     */

    public function index()
    {
        return Inertia::render('Recipes/Index');
    }

    public function create()
    {
        $difficulty = Difficulty::all();
        $persons = Persons::all();
        $types = Type::all();
        $time = Time::all();

        return Inertia::render('Recipes/Create', [
            'difficulty' => $difficulty,
            'persons' => $persons,
            'type' => $types,
            'time' => $time
        ]);
    }

    public function store()
    {
        $newRecipe = new CreateNewRecipe();
        $recipe = $newRecipe->create(Request::only(['name', 'description', 'time', 'difficulty', 'persons', 'type', 'photo']));

        $user = Auth::user();
        $user->recipes()->attach($recipe->getAttribute('id'));

        return Redirect::route('recipes.favorites')->with('success', 'Recipe created.');
    }

    public function favorites()
    {
        $data = DB::table('recipe_user')
            ->join('recipes', 'recipe_user.recipe_id', '=', 'recipes.id')
            ->join('difficulty', 'recipes.difficulty_id', '=', 'difficulty.id')
            ->join('type', 'recipes.type_id', '=', 'type.id')
            ->join('persons', 'recipes.persons_id', '=', 'persons.id')
            ->join('time', 'recipes.time_id', '=', 'time.id')
            ->where('recipe_user.user_id', '=', Auth::id())
            ->get([
                'recipes.id',
                'recipes.name',
                'recipes.description',
                'recipes.recipe_photo_path',
                'difficulty.difficulty',
                'type.type',
                'persons.persons',
                'time.time'
            ]);

        return Inertia::render('Recipes/Favorites', [
            'user'=> Auth::user(),
            'data' => $data,
        ]);
    }

    public function edit(Recipe $recipe)
    {
        $difficulty = DB::table('difficulty')
            ->join('recipes', 'difficulty.id', '=', 'recipes.difficulty_id')
            ->where('recipes.id', '=', $recipe->id)
            ->get(['difficulty.id', 'difficulty.difficulty']);
        $person = DB::table('persons')
            ->join('recipes', 'persons.id', '=', 'recipes.persons_id')
            ->where('recipes.id', '=', $recipe->id)
            ->get(['persons.id', 'persons.persons']);
        $type = DB::table('type')
            ->join('recipes', 'type.id', '=', 'recipes.type_id')
            ->where('recipes.id', '=', $recipe->id)
            ->get(['type.id', 'type.type']);
        $time = DB::table('time')
            ->join('recipes', 'time.id', '=', 'recipes.time_id')
            ->where('recipes.id', '=', $recipe->id)
            ->get(['time.id', 'time.time']);

        $user_recipe = DB::table('recipes')
            ->join('recipe_user', 'recipes.id', 'recipe_user.recipe_id')
            ->where('recipes.id', '=', $recipe->id)
            ->get('recipe_user.id');

        $user_recipe_photo_path = DB::table('recipes')
            ->where('recipes.id', '=', $recipe->id)
            ->get('recipes.recipe_photo_path');

        $difficulties = Difficulty::all();
        $persons = Persons::all();
        $types = Type::all();
        $times = Time::all();

        return Inertia::render('Recipes/Edit', [
            'recipe' => [
                'id' => $recipe->id,
                'name' => $recipe->name,
                'description' => $recipe->description,
                'difficulty' => $difficulty,
                'person' => $person,
                'type' => $type,
                'time' => $time,
                'photo' => $user_recipe_photo_path,
                'times' => $times,
                'difficulties' => $difficulties,
                'persons' => $persons,
                'types' => $types,
                'user_recipe' => $user_recipe
            ],
        ]);
    }

    public function destroy(String $id)
    {
        DB::table('recipe_user')
            ->where('recipe_user.id', '=', $id)
            ->delete();

        return Redirect::route('recipes.favorites')->with('success', 'Recipe deleted.');
    }

    public function update(Recipe $recipe)
    {
        $updateRecipe = new UpdateRecipeInformation();
        $updateRecipe->update($recipe, Request::all());

        return Redirect::route('recipes.favorites')->with('success', 'Recipe updated.');
    }

    public function generate($id)
    {
        $recipe = DB::table('recipes')
            ->where('recipes.id', '=', $id)
            ->get();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream('recipe.pdf');
    }
}
