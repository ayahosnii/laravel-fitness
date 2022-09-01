<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{user_name}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit/{user_name}', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile');
    Route::get('/calories-calculate', [App\Http\Controllers\CalorieCalculatorController::class, 'index'])->name('calorie');
    Route::post('/calories-calculate/store', [App\Http\Controllers\CalorieCalculatorController::class, 'store'])->name('calorie.store');
    Route::get('/meals', [\App\Http\Controllers\MealController::class, 'index'])->name('meals');


    Route::get('/add-food', \App\Http\Livewire\AddfoodComponent::class)->name('add.food');
    Route::view('add_food', 'livewire.show_form');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
