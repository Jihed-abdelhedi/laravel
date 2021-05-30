<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Category;
use \Debugbar;
use Illuminate\Support\Facades\DB;

class LivreController extends Controller
{
    public function index(){

        $livres = Livre::paginate(3);
        //$livres = Livre::all();
        //$livres = Livre::find(['id'=>'1']);
        //$livres = Livre::where('titre','java')->get();
        /* $livres = Livre::where('titre','laravel')
        ->orderBy('id')
        ->take(3)
        ->get(); */
        //dd($livres);
        
        //Debugbar::debug($livres);

        return view('pages.home',compact('livres'));
    }

    public function afficherLivre(Livre $livre){
    
        //dd($id);
        //$livre = Livre::find($id);

        //dd($livre);
        
        return view('pages.afficher_livre',compact('livre'));
    }

    public function ajouterLivre(){
        $categories=Category::all();
        //dd($categories);
        return view('pages.ajouter_livre',compact('categories'));
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
       //dd($request->all());
       Livre::create($request->all());
        //return redirect('/'); //redirection url
       //return redirect()->route('acceuil'); //redirection avec route 

       return back()->with('success','Votre Livre a été inseré');
    }
    public function supprimerLivre(Livre $livre){

        //dd($livre);
        $livre->delete();

        return back()->with('warning','Votre Livre a été supprimée');
    }
}