<?php

namespace App\Http\Controllers;

use App\Agent;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add()
    {
        return view('agent.add');
    }

    public function getAll()
    {
        //$liste_medecins=Medecin::all();
        $liste_agents=Agent::paginate(5);

        return view('agent.list',['liste_agents'=>$liste_agents]);
    }
    public function get($id)
    {
        $agent=Agent::find($id);
        return view('agent.edit',['agent'=>$agent]);
    }
    public function update(Request $request)
    {
        $agent = Agent::find($request->id);
        $agent->nom=$request->nom;
        $agent->prenom=$request->prenom;
        $agent->profil=$request->profil;
        $agent->telephone=$request->telephone;
        $agent->nomade=$request->nomade;
        $agent->user_id= Auth::id();
        $result=$agent->save();
        return redirect('/agent/getAll/');
    }
    public function delete($id)
    {
        $agent  =Agent::find($id);
        if ($agent != null){
            $agent->delete();
        }
        return $this->getAll();
    }
    public function persist(Request $request)
    {
        $agent = new Agent();
        $agent->nom=$request->nom;
        $agent->prenom=$request->prenom;
        $agent->profil=$request->profil;
        $agent->telephone=$request->telephone;
        $agent->nomade=$request->nomade;
        $agent->user_id= Auth::id();
        $result=$agent->save();
        return view('agent.add', ['confirmation'=> $result]);
    }
}
