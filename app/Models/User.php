<?php

namespace App\Models;

use App\Models\Cargo;
use App\Models\Comcumple;
use App\Models\Comfelicitado;
use App\Models\Conferencia;
use App\Models\Felicitadore;
use App\Models\Imagecumple;
use App\Models\Jefe;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

	protected $fillable = [
        'id','roles_id','nombres','codigo','password','estado','deleted','jefes_id','numero','remember_token',
        'cargos_id','email',
    ];  

  

    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function setPasswordAttribute($password) {
        return $this->attributes['password'] = bcrypt($password);
    }
    
    public function role() {
        return $this->belongsTo(Role::class, 'roles_id');
    }

     public function jefe() {
        return $this->belongsTo(Jefe::class, 'jefes_id');
    }

     public function cargo() {
        return $this->belongsTo(Cargo::class, 'cargos_id');
    }

    public function cumple() {
        return $this->hasOne(Cumple::class, 'users_id');
    }
   
   public function felicitadore() {
        return $this->hasOne(Felicitadore::class, 'users_id');
    } 

     public function comcumple() {
        return $this->hasMany(Comcumple::class, 'users_id');
    } 

      public function comfelicitado() {
        return $this->hasMany(Comfelicitado::class, 'users_id');
    } 

    public function imagecumple() {
        return $this->hasMany(Imagecumple::class, 'users_id')->where('deleted',1);
    } 


    public function getIsAdminAttribute() {
        return $this->role->id === 1;
    }

    public function getIsEmployeeAttribute() {
        return $this->role->id === 2;
    }

    
     public function conferencias(){
       return $this->belongsToMany(Conferencia::class,'conferencias_users','users_id','conferencias_id')->as('user_confer')->withPivot('estado','deleted')->withTimestamps();
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
