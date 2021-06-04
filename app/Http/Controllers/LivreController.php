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
        //DebugBar::debug('bonjour');
        

        //dd($livre->category->nom_categorie);
        return view('pages.afficher_livre',compact('livre'));
    }

    public function ajouterLivre(){
        //$categories=Category::all(); //$categories declaré dans AppServiceProvider

        //dd($categories);

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
        'description'=>'min:10',
        'categorie_id=>required'
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
    public function editerLivre($id){
        $livre=Livre::find($id);
        //$categories=Category::all(); //$categories declaré dans AppServiceProvider
        return view('pages.editer_livre',compact('livre'));
    }

    public function postediterLivre(Request $request, $id)
    {
        $request->validate([
            'titre'=>'required|min:5|alpha_num',
            'description'=>'min:10',
            'categorie_id=>required'
          ]);
        //dd($request->all());
        $livre = Livre::find($id)->update($request->all());
        return back()->with('success','Livre edité avec succés');

    }
}
