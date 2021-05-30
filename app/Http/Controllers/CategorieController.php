<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function ajouterCategorie(){
        return view('pages.ajouter_categorie');
    }
    public function postAjouterCategorie(Request $request){

        $request->validate(['nom_categorie'=>'required|min:5|alpha_num|unique:categories']);
         // dd($request->all());

         Category::create($request->all());
         return back()->with('success','Votre Categorie a été inseré');
    }
 
}
