<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UsersController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard/Index');
    })->name('dashboard');

    /*
    Route::get('dashboard/recipes', function() {
        return Inertia::render('Recipes/Index');
    })->name('recipes');
    */

    Route::middleware([
        'owner'
    ])->group(function() {
        // Users
        Route::get('dashboard/admin/users', [UsersController::class, 'index'])->name('users');
        Route::get('dashboard/admin/users/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('dashboard/admin/users', [UsersController::class, 'store'])->name('users.store');
        Route::get('dashboard/admin/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::put('dashboard/admin/users/{user}', [UsersController::class, 'update'])->name('users.update');
        Route::delete('dashboard/admin/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
    });

    // Recipes
    Route::get('dashboard/recipes', [RecipeController::class, 'index'])->name('recipes');
    Route::get('dashboard/recipes/favorites', [RecipeController::class, 'favorites'])->name('recipes.favorites');
    Route::get('dashboard/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('dashboard/recipes', [RecipeController::class, 'store'])->name('recipes.store');

    // Images
    Route::get('/storage/{path}', [ImagesController::class, 'show'])
        ->where('path', '.*')
        ->name('image');
});

Route::get('/', function() {
    return Inertia::render('Welcome');
})->name('home');

Route::post('/send-contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('message-success', function () {
    return Inertia::render('ContactMessageView');
})->name('message.success');

Route::get('/explore', function() {
    return Inertia::render('Explore');
})->name('explore');

Route::get('/about', function() {
    return Inertia::render('About');
})->name('about');

Route::get('/explore/recipe/1', function() {
    return Inertia::render('Recipes/Examples/RecipeOne');
})->name('recipeone');
