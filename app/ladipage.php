<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ladipage extends Model
{
    protected $table = "ladipage";
	public function User()
	{
		return $this->belongsTo('App\User','user_id','id');
	}
	public function menu()
	{
		return $this->belongsTo('App\menu','menu_id','id');
	}
	public function section()
    {
        return $this->hasMany('App\section','ladipage_id','id');
    }
	
}
