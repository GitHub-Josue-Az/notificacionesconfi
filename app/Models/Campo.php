<?php

namespace App\Models;

use App\Models\Cupone;
use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{

     public $timestamps = false;
    
    protected $fillable = [
        'nombres','descripcion','estado','deleted',
    ];  
    
	 public function cupone(){
       return $this->hasMany(Cupone::class,'campos_id');
   }

}
