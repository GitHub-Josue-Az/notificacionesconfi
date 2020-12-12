<?php

namespace App\Models;

use App\Models\Comcumple;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cumple extends Model
{
    public $timestamps = false;

    protected $table = 'cumples';
    
    protected $fillable = [
        'fechacumples','users_id','estado','deleted',
    ];  

  protected $casts = [
     'fechacumples' => 'datetime:Y-m-d',
    ];

	 public function user(){
       return $this->belongsTo(User::class,'users_id');
      }

   public function comcumple(){
     return $this->hasMany(Comcumple::class,'cumples_id');
   }

    public function getFechaTagAttribute() {

            $hoy = Carbon::now('America/Lima');
            $maña = Carbon::now('America/Lima');
            $mañana = $maña->addDay()->format('m-d'); 
            $hoynew = $hoy->format('m-d');

            $fecha = new Carbon($this->fechacumples); 
            $fechanew = $fecha->format('m-d');

                switch ($fechanew){
                    case $hoynew: 
                        return '<span style="font-size:130%; align-items:center;display: inline-flex;" class="badge badge-success mb-1 rounded"> Hoy <i class="iconsminds-birthday-cake" style="font-size:150%;"></i></span>';   
                     case $mañana: 
                        return '<span style="font-size:130%; align-items:center;display: inline-flex;" class="badge badge-warning mb-1 rounded"> Mañana <i class="simple-icon-present" style="font-size:150%;"></i></span>';   
                    default : 
                        return '<span> Ahora no joven</span>';   
                }
        
        } 

         public function getEstadoTagAttribute() {

                switch ($this->estado){
                    case 1: 
                        return '<span  style="font-size:100%" class="badge badge-pill badge-outline-primary mb-1"> Disponible </span>';   

                    default : 
                        return '<span  style="font-size:100%" class="badge badge-pill badge-outline-danger mb-1"> Finalizado </span>';   
                }
        
        } 


}
