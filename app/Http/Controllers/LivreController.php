<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;

class LivreController extends Controller
{
    public function index(){

        //$livres = Livre::all();
        //$livres = Livre::find(['id'=>'1']);
        //$livres = Livre::where('titre','java')->get();
        /* $livres = Livre::where('titre','laravel')
        ->orderBy('id')
        ->take(3)
        ->get(); */
        //dd($livres);

        return view('pages.home',compact('livres'));
    }

    public function ajouterLivre(){
        return view('pages.ajouter_livre');
    }
    public function postAjouterLivre(Request $request){
         // ddd($request->all());
      /*  $livre= new Livre();
       $livre->titre = $request->titre;
       $livre->description =$request->description;

       

       $livre->save(); */

       $request->validate([
        'titre'=>'required|min:5|alpha_num',
        'description'=>'min:10'
      ]);
       
       Livre::create($request->all());
        //return redirect('/'); //redirection url
       //return redirect()->route('acceuil'); //redirection avec route 

       return back()->with('success','Votre Livre a été inseré');
    }
}