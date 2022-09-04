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


    Route::get('/counter', \App\Http\Livewire\Counter::class);
    Route::view('add-food', 'livewire.show_form')->name('add.food');

});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Auth::routes();
