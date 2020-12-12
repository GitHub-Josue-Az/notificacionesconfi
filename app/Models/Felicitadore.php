<?php

namespace App\Models;

use App\Models\Comfelicitado;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Felicitadore extends Model
{

	public $timestamps = false;

  protected $tables = 'felicitadores';


   protected $fillable = [
        'users_id','estado','deleted',
    ];  
    
	 public function user(){
       return $this->belongsTo(User::class,'users_id');
   }

   public function comfelicitado(){
   	return $this->hasMany(Comfelicitado::class,'felicitadores_id');
   }

}
