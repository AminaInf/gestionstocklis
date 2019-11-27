<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lis extends Model
{
    protected $fillable = array('date','enstock');
    public static $rules =array('date'=>'required|min:2',
        'enstock'=>'required|min:2'


    );
    public function articles()
    {
        return $this->hasmany('App\Article');
    }
}
