<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;


Route::get('/',[LivreController::class,'index'])->name('acceuil');
Route::get('/ajouter_livre',[LivreController::class,'ajouterLivre'])->name('ajouter_livre');
Route::post('/ajouter_livre', [LivreController::class,'postAjouterLivre'])->name('post_ajouter_livre');

Route::get('/afficher_livre/{livre}',[LivreController::class,'afficherLivre'])->name('afficher_livre');

Route::get('/ajouter_categorie',[CategorieController::class,'ajouterCategorie'])->name('ajouter_categorie');
Route::post('/ajouter_categorie',[CategorieController::class,'postAjouterCategorie'])->name('post_ajouter_categorie');

Route::get('/supprimer_livre/{livre}',[LivreController::class,'supprimerLivre'])->name('supprimer_livre');

