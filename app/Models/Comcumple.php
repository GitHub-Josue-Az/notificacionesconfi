<?php

namespace App\Models;

use App\Models\Cumple;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comcumple extends Model
{

    protected $fillable = [
        'descripcion','users_id','estado','deleted','cumples_id'
    ];  
    
	 public function user(){
       return $this->belongsTo(User::class,'users_id');
   }

   public function cumple(){
       return $this->belongsTo(Cumple::class,'cumples_id');
   }

   
         public function getEstadoTagAttribute() {

                switch ($this->estado){
                    case 1: 
                        return '<span  style="font-size:100%" class="badge badge-pill badge-outline-primary mb-1"> Activo </span>';   

                    default : 
                        return '<span  style="font-size:100%" class="badge badge-pill badge-outline-danger mb-1"> Inactivo </span>';   
                }
        
        } 


}
