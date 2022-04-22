<?php

use App\Http\Controllers\ImagesController;
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

    Route::get('dashboard/recipes', function() {
        return Inertia::render('Recipes/Index');
    })->name('recipes');

    Route::get('dashboard/favorites', function() {
        return Inertia::render('Recipes/Favorites');
    })->name('favorites');

    // Users
    Route::get('dashboard/admin/users', [UsersController::class, 'index'])->name('users');
    Route::get('dashboard/admin/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');

    // Images
    Route::get('/storage/{path}', [ImagesController::class, 'show'])
        ->where('path', '.*')
        ->name('image');
});

Route::get('/', function() {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/explore', function() {
    return Inertia::render('Explore');
})->name('explore');

Route::get('/about', function() {
    return Inertia::render('About');
})->name('about');
