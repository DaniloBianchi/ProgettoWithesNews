<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Http;

Route::get('/', [PageController::class, 'home']) -> name('home');
Route::get('/chi-sono', [PageController::class, 'aboutUs']) -> name('chi-sono');
Route::get('/articoli', [PageController::class, 'articoli']) -> name('articoli')->middleware('auth');
Route::get('/articolo/{article}', [PageController::class, 'articolo']) -> name('articolo');

Route::get('/contatti', [ContactController::class, 'form']) -> name('contatti');
Route::post('/contatti/send', [ContactController::class, 'send']) -> name('contatti.send');

Route::get('/anime/genres',[AnimeController::class, 'index']) -> name('anime.genres');
Route::get('/anime/genres/{article}',[AnimeController::class, 'animeByGenre']) -> name('anime.genres.id');

// Route::get('articles', [ArticleController::class, 'storeDatabase'])->name('articles');
//vedi route\account per rotte middleware()

//Passo direrttamente il componente livewire
Route::get('/counter', \App\Livewire\Counter::class);
Route::get('/search', \App\Livewire\SearchUsers::class);
Route::get('/search', \App\Livewire\SearchArticles::class);

Route::get('/todo', function (){
    return view('todo');
})->name('todo');