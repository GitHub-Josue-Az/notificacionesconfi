<?php

namespace App\Models;

use App\Models\Campo;
use Illuminate\Database\Eloquent\Model;

class Cupone extends Model
{
    public $timestamps = false;

   protected $table = 'cupones';
    
    protected $fillable = [
        'campos_id','nombre','direccion','contacto','aplicable','imagen','detalles','estado','deleted','telefono'
    ];  
    
	 public function campo(){
       return $this->belongsTo(Campo::class,'campos_id');
   }


}
