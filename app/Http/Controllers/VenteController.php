<?php

namespace App\Http\Controllers;
use App\Article;
use App\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenteController extends Controller
{
    public function add()
    {

        $articles = Article::all();
        return view('vente.add',['articles' => $articles]);


    }
    public function getAll()
    {
        $liste_vente=Vente::all();
        //$liste_rendezvous=Medecin::paginate(2);

        return view('vente.list',['liste_vente'=>$liste_vente]);
    }
    public function get($id)
    {
        $vente=Vente::find($id);
        return view('vente.edit',['vente'=>$vente]);
    }
    public function update(Request $request)
    {
        $vente = Vente::find($request->id);
        $vente->user_id= Auth::id();
        $vente->articles_id=$request->articles_id;
        $vente->quantite=$request->quantite;
        $vente->date=$request->date;
        $result=$vente->save();
        return redirect('/vente/getAll/');
    }
    public function delete($id)
    {
        $vente  =Vente::find($id);
        if ($vente != null){
            $vente->delete();
        }
        return $this->getAll();
    }
    public function persist(Request $request)
    {
        $vente = new Vente();
        $vente->articles_id=$request->articles_id;
        $vente->user_id= Auth::id();
        $vente->quantite=$request->quantite;
        $vente->date=$request->date;
        $result=$vente->save();
        return view('vente.add', ['confirmation'=> $result]);
    }
}
