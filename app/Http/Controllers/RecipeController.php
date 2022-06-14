<?php

namespace App\Http\Controllers;

use App\Actions\Recipes\CreateNewRecipe;
use App\Actions\Recipes\UpdateRecipeInformation;
use App\Models\Difficulty;
use App\Models\Favorites;
use App\Models\Ingredient;
use App\Models\Persons;
use App\Models\Recipe;
use App\Models\Time;
use App\Models\Type;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
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
        return Inertia::render('Recipes/Index', [
            'filters' => Request::only(['ingredient', 'search', 'type', 'time']),
            'recipes' => Recipe::query()
                ->when(Request::input('ingredient'), function($query, $ingredient) {
                    $query->where('ingredients', 'like', "%{$ingredient}%");
                })
                ->when(Request::input('search'), function($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->when(Request::input('type'), function($query, $type) {
                    $query->where('type_id', '=', $type);
                })
                ->when(Request::input('time'), function($query, $time) {
                    $query->where('time_id', '=', $time);
                })
                ->paginate(8)
                ->withQueryString()
                ->through(fn ($recipe) => [
                    'id' => $recipe->id,
                    'name' => $recipe->name,
                    'description' => $recipe->description,
                    'time' => $recipe->time->time,
                    'difficulty' => $recipe->difficulty->difficulty,
                    'persons' => $recipe->persons->persons,
                    'type' => $recipe->type->type,
                    'photo' => $recipe->recipe_photo_path ?? null,
                ]),
            'types' => Type::all(),
            'times' => Time::all(),
            'favorites' => Favorites::all(),
            'user' => Auth::user()
        ]);
    }

    public function show(Recipe $recipe)
    {
        return Inertia::render('Recipes/Show', [
            'recipe' => $recipe
        ]);
    }

    public function create()
    {
        $difficulty = Difficulty::all();
        $persons = Persons::all();
        $types = Type::all();
        $time = Time::all();
        $ingredients = Ingredient::all();

        return Inertia::render('Recipes/Create', [
            'difficulty' => $difficulty,
            'persons' => $persons,
            'type' => $types,
            'time' => $time,
            'ingredients' => $ingredients
        ]);
    }

    public function store()
    {
        $newRecipe = new CreateNewRecipe();

        $request = [
            'name' => Request('name'),
            'description' => Request('description'),
            'time' => Request('time'),
            'difficulty' => Request('difficulty'),
            'persons' => Request('persons'),
            'type' => Request('type'),
            'photo' => Request('photo'),
            'ingredients' => Request('ingredients') && is_array(Request('ingredients')) !== null ? implode(", ", Request('ingredients')) : []
        ];

        $recipe = $newRecipe->create($request);
        $user = Auth::user();
        $user->recipes()->attach($recipe->getAttribute('id'));

        return Redirect::route('recipes.mine')->with('success', 'Recipe created.');
    }

    public function myRecipes()
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
                'time.time',
                'recipes.ingredients'
            ]);

        return Inertia::render('Recipes/MyRecipes', [
            'user'=> Auth::user(),
            'data' => $data,
        ]);
    }

    public function addFav($id)
    {

        //COMPROBACION DE QUE YA ESTA AÑADIDO O NO
        $checkFav = DB::table('favorites')
        ->join('users', 'favorites.user_id', '=', 'users.id')
        ->join('recipes', 'favorites.recipe_id', '=', 'recipes.id')
        ->where('favorites.user_id', '=', Auth::id())
        ->where('favorites.recipe_id', '=', $id)
        ->get(
            'recipes.id'
        );
        $array = $checkFav->toArray();

        if(count($array) == 0)
        {
            //INSERCION
            DB::table('favorites')->insert([
                'recipe_id' => $id,
                'user_id' => Auth::id(),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        } else {
            //DELETE
            DB::table('favorites')
            ->where('favorites.user_id', '=', Auth::id())
            ->where('favorites.recipe_id', '=', $id)
            ->delete();
        }

        return Redirect::route('recipes.favs')->with('success', 'Recipe added to favorites.');
    }

    public function favs()
    {
        $data = DB::table('favorites')
            ->join('users', 'favorites.user_id', '=', 'users.id')
            ->join('recipes', 'favorites.recipe_id', '=', 'recipes.id')
            ->join('difficulty', 'recipes.difficulty_id', '=', 'difficulty.id')
            ->join('type', 'recipes.type_id', '=', 'type.id')
            ->join('persons', 'recipes.persons_id', '=', 'persons.id')
            ->join('time', 'recipes.time_id', '=', 'time.id')
            ->where('favorites.user_id', '=', Auth::id())
            ->get([
                'recipes.id',
                'recipes.name',
                'recipes.description',
                'recipes.recipe_photo_path',
                'difficulty.difficulty',
                'type.type',
                'persons.persons',
                'time.time',
                'recipes.ingredients'
            ]);

        return Inertia::render('Recipes/MyFavorites', [
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
        $all_ingredients = Ingredient::all();

        return Inertia::render('Recipes/Edit', [
            'recipe' => [
                'id' => $recipe->id,
                'name' => $recipe->name,
                'description' => $recipe->description,
                'ingredients' => explode(", ", $recipe->ingredients),
                'difficulty' => $difficulty,
                'person' => $person,
                'type' => $type,
                'time' => $time,
                'photo' => $user_recipe_photo_path,
                'times' => $times,
                'difficulties' => $difficulties,
                'persons' => $persons,
                'types' => $types,
                'user_recipe' => $user_recipe,
                'allIngredients' => $all_ingredients
            ],
        ]);
    }

    public function destroy(String $id)
    {
        DB::table('recipe_user')
            ->where('recipe_user.id', '=', $id)
            ->delete();

        return Redirect::route('recipes.mine')->with('success', 'Recipe deleted.');
    }

    public function update(Recipe $recipe)
    {
        $request = [
            'name' => Request('name'),
            'description' => Request('description'),
            'time' => Request('time'),
            'difficulty' => Request('difficulty'),
            'persons' => Request('persons'),
            'type' => Request('type'),
            'photo' => Request('photo'),
            'ingredients' => Request('ingredients') && is_array(Request('ingredients')) !== null ? implode(", ", Request('ingredients')) : []
        ];

        $updateRecipe = new UpdateRecipeInformation();
        $updateRecipe->update($recipe, $request);

        return Redirect::back()->with('success', 'Recipe updated.');
    }

    public function generate($id)
    {
        $recipe_data = [];
        $date = Carbon::now()->toDateTimeString();

        $recipe = DB::table('recipes')
            ->where('recipes.id', '=', $id)
            ->get();
        $difficulty = DB::table('difficulty')
            ->join('recipes', 'difficulty.id', '=', 'recipes.difficulty_id')
            ->where('recipes.id', '=', $id)
            ->get(['difficulty.id', 'difficulty.difficulty'])->toArray();
        $person = DB::table('persons')
            ->join('recipes', 'persons.id', '=', 'recipes.persons_id')
            ->where('recipes.id', '=', $id)
            ->get(['persons.id', 'persons.persons'])->toArray();
        $type = DB::table('type')
            ->join('recipes', 'type.id', '=', 'recipes.type_id')
            ->where('recipes.id', '=', $id)
            ->get(['type.id', 'type.type'])->toArray();
        $time = DB::table('time')
            ->join('recipes', 'time.id', '=', 'recipes.time_id')
            ->where('recipes.id', '=', $id)
            ->get(['time.id', 'time.time'])->toArray();
        $ingredients = DB::table('recipes')
            ->where('recipes.id', '=', $id)
            ->get('recipes.ingredients')->toArray();

        // Logo encode to base64
        $path = public_path('logo.png');
        $type_photo = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/' . $type_photo . ';base64,' . base64_encode($data_img);

        $recipe_photo = explode('/', $recipe[0]->recipe_photo_path);

        $recipe_data = [
            'name' => $recipe[0]->name,
            'description' => $recipe[0]->description,
            'time' => $time[0]->time,
            'difficulty' => $difficulty[0]->difficulty,
            'persons' => $person[0]->persons,
            'type' => $type[0]->type,
            'ingredients' => $ingredients[0]->ingredients,
            'photo' => $recipe_photo[6], // When explode the photo name is the #6
        ];

        $pdf = PDF::loadView('pdf', [
            'recipe_data' => $recipe_data,
            'logo' => $base64,
            'date' => $date
        ])->setPaper('letter');

        return $pdf->stream('Recipe - ' . $recipe_data['name']);
    }
}
