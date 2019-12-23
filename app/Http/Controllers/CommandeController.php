<?php

namespace App\Http\Controllers;

use App\Article;
use App\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function add()
    {

        $articles = Article::all();
        return view('commande.add',['articles' => $articles]);
    }
    public function getAll()
    {
        $liste_commande=Commande::all();
        //$liste_rendezvous=Medecin::paginate(2);

        return view('commande.list',['liste_commande'=>$liste_commande]);
    }
    public function get($id)
    {
        $commande=Commande::find($id);
        return view('commande.edit',['commande'=>$commande]);
    }
    public function update(Request $request)
    {
        $commande = Commande::find($request->id);
        $commande->user_id= Auth::id();
        $commande->articles_id=$request->articles_id;
        $commande->quantite=$request->quantite;
        $commande->date=$request->date;
        $result=$commande->save();
        return redirect('/commande/getAll/');
    }
    public function delete($id)
    {
        $commande  =Commande::find($id);
        if ($commande != null){
            $commande->delete();
        }
        return $this->getAll();
    }
    public function persist(Request $request)
    {
        $commande = new Commande();
        $commande->articles_id=$request->articles_id;
        $commande->user_id= Auth::id();
        $commande->quantite=$request->quantite;
        $commande->date=$request->date;
        $result=$commande->save();
        return view('commande.add', ['confirmation'=> $result]);
    }
}
