<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {
Route::get('/', function () {
    return view('welcome');
});



\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{user_name}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit/{user_name}', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/calories-calculate', [App\Http\Controllers\CalorieCalculatorController::class, 'index'])->name('calorie');
    Route::post('/calories-calculate/store', [App\Http\Controllers\CalorieCalculatorController::class, 'store'])->name('calorie.store');
    Route::get('/meals', [\App\Http\Controllers\MealController::class, 'index'])->name('meals');


    Route::get('/food-dairy', [\App\Http\Controllers\FoodDairyController::class, 'index'])->name('dairy');
    Route::get('/food-dairy/add-breakfast', [\App\Http\Controllers\FoodDairyController::class, 'breakfast'])->name('dairy.breakfast');
    Route::post('/food-dairy/add-breakfast/store', [\App\Http\Controllers\FoodDairyController::class, 'breakfastStore'])->name('dairy.breakfast.store');
    Route::get('/food-dairy/add-lunch', [\App\Http\Controllers\FoodDairyController::class, 'lunch'])->name('dairy.lunch');
    Route::post('/food-dairy/add-lunch/store', [\App\Http\Controllers\FoodDairyController::class, 'lunchStore'])->name('dairy.lunch.store');
    Route::get('/food-dairy/add-dinner', [\App\Http\Controllers\FoodDairyController::class, 'dinner'])->name('dairy.dinner');
    Route::post('/food-dairy/add-dinner/store', [\App\Http\Controllers\FoodDairyController::class, 'dinnerStore'])->name('dairy.dinner.store');
    Route::post('/food-dairy/store', [\App\Http\Controllers\FoodDairyController::class, 'store'])->name('dairy.store');


    Route::get('/counter', \App\Http\Livewire\Counter::class);
    Route::view('add-food', 'livewire.show_form')->name('add.food');

});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Auth::routes();
