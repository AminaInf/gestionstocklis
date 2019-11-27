<?php

namespace App\Http\Controllers;

use App\Lis;
use Illuminate\Http\Request;

class LisController extends Controller
{
    public function add()
    {

        return view('lis.add');
    }
    public function getAll()
    {
        $liste_stock=Lis::all();
        //$liste_rendezvous=Medecin::paginate(2);

        return view('lis.list',['liste_stock'=>$liste_stock]);
    }
    public function get($id)
    {
        $lis=Lis::find($id);
        return view('lis.edit',['lis'=>$lis]);
    }
    public function update(Request $request)
    {
        $lis = Lis::find($request->id);
        $lis->enstock=$request->enstock;
        $lis->date=$request->date;
        $result=$lis->save();
        return redirect('/lis/getAll/');
    }
    public function delete($id)
    {
        $lis  =Lis::find($id);
        if ($lis != null){
            $lis->delete();
        }
        return $this->getAll();
    }
    public function persist(Request $request)
    {
        $lis = new Lis();
        $lis->enstock=$request->enstock;
        $lis->date=$request->date;
        $result=$lis->save();
        return view('lis.add', ['confirmation'=> $result]);
    }
}
