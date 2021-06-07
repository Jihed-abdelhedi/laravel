<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;

//acceuil
Route::get('/',[LivreController::class,'index'])->name('acceuil');

Route::middleware(['auth'])->group(function () {

    Route::get('/ajouter_livre',[LivreController::class,'ajouterLivre'])->name('ajouter_livre');
    Route::get('/supprimer_livre/{livre}',[LivreController::class,'supprimerLivre'])->name('supprimer_livre');
    Route::get('/editer_livre/{id}',[LivreController::class,'editerLivre'])->name('editer_livre');
    Route::get('/ajouter_categorie',[CategorieController::class,'ajouterCategorie'])->name('ajouter_categorie');

});

//livre

Route::post('/ajouter_livre', [LivreController::class,'postAjouterLivre'])->name('post_ajouter_livre');
Route::get('/afficher_livre/{livre}',[LivreController::class,'afficherLivre'])->name('afficher_livre');


Route::post('/editer_livre/{id}',[LivreController::class,'postEditerLivre'])->name('post_editer_livre');


//categorie
Route::post('/ajouter_categorie',[CategorieController::class,'postAjouterCategorie'])->name('post_ajouter_categorie');
Route::get('/afficher_categorie/{id}',[CategorieController::class,'afficherCategorie'])->name('afficher_categorie');
Route::post('/chercher_livre',[LivreController::class,'chercherLivre'])->name('chercher_livre');

//register and login
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/register',[AuthController::class,'register'])->name(('register'));

Route::post('/register',[AuthController::class,'subscribe'])->name('subscribe');
Route::post('/login',[AuthController::class,'postLogin'])->name('post_login');