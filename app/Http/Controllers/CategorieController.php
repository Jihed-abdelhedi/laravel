<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Livre;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function ajouterCategorie(){
        $categories=Category::orderBy('id','DESC')->get();
        return view('pages.ajouter_categorie',compact('categories'));
    }
    public function postAjouterCategorie(Request $request){

        $request->validate(['nom_categorie'=>'required|min:5|alpha_num|unique:categories']);
         // dd($request->all());

         Category::create($request->all());
         return back()->with('success','Votre Categorie a été inseré');
    }
    public function afficherCategorie($id){
      $cat = Category::find($id);
        
        //dd($cat);
        return view('pages.afficher_categorie',compact('cat'));
    }
 
}
