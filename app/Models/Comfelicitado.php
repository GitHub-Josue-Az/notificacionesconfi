<?php

namespace App\Models;

use App\Models\Felicitadore;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comfelicitado extends Model
{

  protected $tables = 'comfelicitados';
  	
  	protected $fillable = [
        'descripcion','users_id','estado','deleted','felicitadores_id'
    ];  
    
	 public function user(){
       return $this->belongsTo(User::class,'users_id');
   }

   public function felicitadore(){
       return $this->belongsTo(Felicitadore::class,'felicitadores_id');
   }
}
