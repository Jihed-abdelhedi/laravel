<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;


Route::get('/',[LivreController::class,'index'])->name('acceuil');
Route::get('/ajouter_livre',[LivreController::class,'ajouterLivre'])->name('ajouter_livre');
Route::post('/ajouter_livre', [LivreController::class,'postAjouterLivre'])->name('post_ajouter_livre');

