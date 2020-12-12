<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Conferencia extends Model
{

	protected $fillable = [
        'descripcion','estado','deleted','capacidad','limithour','imagen','nombre','created_at','entidad'
    ]; 


    public function users(){
       
       return $this->belongsToMany(User::class,'conferencias_users','conferencias_id','users_id')->as('confer_user')->withPivot('estado','deleted')->withTimestamps();
   }

    protected $dates = [
        'limithour',
    ];

    public function getEstadoTagAttribute() {

                switch ($this->estado){
                    case 1: 
                        return '<span  style="font-size:100%" class="badge badge-pill badge-outline-primary mb-1"> Activo </span>';   

                    default : 
                        return '<span  style="font-size:100%" class="badge badge-pill badge-outline-danger mb-1"> Inactivo </span>';   
                }
        
        } 
   

       public function getEstadopivotTagAttribute() {

                switch ($this->confer_user->estado){
                    case 1: 
                        return '<span  style="font-size:100%" class="badge badge-pill badge-outline-primary mb-1"> Aceptado </span>';
                    case 2: 
                        return '<span  style="font-size:100%" class="badge badge-pill badge-outline-danger mb-1"> Rechazado </span>';        

                    default : 
                        return '<span  style="font-size:100%" class="badge badge-pill badge-outline-warning mb-1"> Pendiente </span>';   
                }
        
        }   


}
