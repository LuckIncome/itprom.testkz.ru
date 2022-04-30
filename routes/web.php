<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TrendController;

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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::match(['post', 'get'], '/search', [SearchController::class, 'index'])->name('search');

Route::post('/feedback', [FeedbackController::class,'feedback'])->name('feedback');
Route::post('/join', [FeedbackController::class,'join'])->name('join');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/market', [MarketController::class, 'index'])->name('market');
Route::get('/market/{market}', [MarketController::class, 'show'])->name('market.show');

Route::get('/projects', [ProjectController::class, 'index'])->name('project');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('project.show');

Route::get('/trends', [TrendController::class, 'index'])->name('trends');
Route::get('/trends/{trends}', [TrendController::class, 'show'])->name('trends.show');

Route::get('/locale/{lang}',[PagesController::class,'setLocale'])->name('locale.set');
Route::get('/{page?}',[PagesController::class,'getPage'])->name('pages.get');

