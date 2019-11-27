<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function add()
    {

        return view('article.add');
    }
    public function getAll()
    {
        $liste_article=Article::all();
        //$liste_rendezvous=Medecin::paginate(2);

        return view('article.list',['liste_article'=>$liste_article]);
    }
    public function get($id)
    {
        $article=Article::find($id);
        return view('article.edit',['article'=>$article]);
    }
    public function update(Request $request)
    {
        $article = Article::find($request->id);
        $article->libelle=$request->libelle;
        $article->agents_id=$request->agents_id;
        $article->lis_id=$request->lis_id;
        $result=$article->save();
        return redirect('/article/getAll/');
    }
    public function delete($id)
    {
        $article  =Article::find($id);
        if ($article != null){
            $article->delete();
        }
        return $this->getAll();
    }
    public function persist(Request $request)
    {
        $article = new Article();
        $article->libelle=$request->libelle;
        $article->agents_id=$request->agents_id;
        $article->lis_id=$request->lis_id;
        $result=$article->save();
        return view('article.add', ['confirmation'=> $result]);
    }
}
