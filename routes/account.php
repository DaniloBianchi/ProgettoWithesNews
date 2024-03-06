<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;

//posso scrivere middleware() sulla singola rotta, o posso usare un metodo per proteggere piu rotte contemporaneamente

//Route::get('/articles/form',[ArticleController::class, 'create'])->name('form.create')->middleware('auth');
//Route::post('/articles/store',[ArticleController::class, 'store'])->name('form.store')->middleware('auth');
//Route::get('/account',[AccountController::class, 'index'])->name('account')->middleware('auth');
/*
  middleware('auth') rende raggiungibile la rotta solo dall'utente 'auth'
 (rotta protetta non accessibile digitando url nella barra)
*/
//PER DIRE A LARAVEL DI UTILIZZARE ANCHE LE LOTTE PRESENTI IN QUESTO FILE DEVO MODIFICARE HTTP\PROVIDER\ROUTESERVICEPROVAIDER
Route::middleware('auth')->group(function (){
    //inserire rotte da proteggere
Route::get('/articles/form',[ArticleController::class, 'create'])->name('form.create');
Route::post('/articles/store',[ArticleController::class, 'store'])->name('form.store');
Route::get('/account',[AccountController::class, 'index'])->name('account');

Route::resource('categories', CategoryController::class);
Route::resource('articles', ArticleController::class);

});
