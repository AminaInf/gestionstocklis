<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = array('user_id','lis_id','libelle');
    public static $rules =array(
        'user_id'=>'required|bigInteger',
        'lis_id'=>'required|integer',
        'libelle'=>'required|min:2'

    );
    public function commandes()
    {
        return $this->hasmany('App\Commande');
    }
    public function ventes()
    {
        return $this->hasmany('App\Ventes');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function lis()
    {
        return $this->belongsTo('App\Lis');
    }
}
