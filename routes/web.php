<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/kegiatan/{slug}', [LandingPageController::class, 'showActivity'])->name('showActivity');
Route::get('/artikel/{slug}', [LandingPageController::class, 'showArticle'])->name('showArticle');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('pages.admin.index');
    });
    
    Route::resource('detail', DetailController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('article', ArticleController::class); 
    Route::get('registration', [RegistrationController::class, 'index'])->name('admin.registration');
});



Auth::routes();
