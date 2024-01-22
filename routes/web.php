<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\FilmController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//PODCAST
Route::get('/podcast', [PodcastController::class, 'list'])->name('podcast.list');
Route::get('/podcast/create', [PodcastController::class, 'getCreate'])->name('podcast.create.get');
Route::post('/podcast/create', [PodcastController::class, 'postCreate'])->name('podcast.create.post');
Route::get('/podcast/{id}', [PodcastController::class, 'getEdit'])->name('podcast.edit.get');
Route::post('/podcast/{id}', [PodcastController::class, 'postEdit'])->name('podcast.edit.post');

//SERIES
Route::get('/series', [SeriesController::class, 'list'])->name('series.list');
Route::get('/series/create', [SeriesController::class, 'getCreate'])->name('series.create.get');
Route::post('/series/create', [SeriesController::class, 'postCreate'])->name('series.create.post');
Route::get('/series/{id}', [SeriesController::class, 'getEdit'])->name('series.edit.get');
Route::post('/series/{id}', [SeriesController::class, 'postEdit'])->name('series.edit.post');


//FILM
Route::get('/film', [FilmController::class, 'list'])->name('film.list');
Route::get('/film/create', [FilmController::class, 'getCreate'])->name('film.create.get');
Route::post('/film/create', [FilmController::class, 'postCreate'])->name('film.create.post');
Route::get('/film/{id}', [FilmController::class, 'getEdit'])->name('film.edit.get');
Route::post('/film/{id}', [FilmController::class, 'postEdit'])->name('film.edit.post');
