<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LandingPageController;

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

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/form', [LandingPageController::class, 'form'])->name('form');
Route::post('/registration', [LandingPageController::class, 'registration'])->name('registration');

route::middleware(['auth'])->group(function () {
    Route::resource('detail', DetailController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('article', ArticleController::class);
});


Auth::routes();
