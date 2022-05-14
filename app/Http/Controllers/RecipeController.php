<?php

namespace App\Http\Controllers;

use App\Actions\Recipes\CreateNewRecipe;
use App\Models\Difficulty;
use App\Models\Persons;
use App\Models\Recipe;
use App\Models\Time;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;
use SebastianBergmann\Diff\Diff;

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
        $recipe = $newRecipe->create(Request::only(['name', 'description', 'time', 'difficulty', 'persons', 'type']));

        $user = Auth::user();
        $user->recipes()->attach($recipe->getAttribute('id'));

        return Redirect::route('recipes.favorites')->with('success', 'Recipe created.');
    }

    public function favorites()
    {
        $difficulty = DB::table('recipes')
            ->join('difficulty', 'recipes.difficulty_id', '=', 'difficulty.id')
            ->get(['difficulty.id', 'difficulty.difficulty']);

        $type = DB::table('recipes')
            ->join('type', 'recipes.type_id', '=', 'type.id')
            ->get(['type.id', 'type.type']);

        $persons = DB::table('recipes')
            ->join('persons', 'recipes.persons_id', '=', 'persons.id')
            ->get(['persons.id', 'persons.persons']);

        return Inertia::render('Recipes/Favorites', [
            'user'=> Auth::user(),
            'recipes' => User::query()->find(Auth::id())->recipes()->get(),
            'difficulty' => $difficulty,
            'type' => $type,
            'persons' => $persons
        ]);
    }
}
