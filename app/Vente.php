<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $fillable = array('user_id','articles_id','date','quantite');
    public static $rules =array(
        'user_id'=>'required|bigInteger',
        'date'=>'required|min:3',
        'quantite'=>'required|integer'

    );
    public function articles()
    {
        return $this->belongsTo('App\Article');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
