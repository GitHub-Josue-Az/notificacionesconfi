<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
   public $timestamps = false;
    
    protected $fillable = [
        'nombre','descripcion',
    ];  
    
	 public function user() {
        return $this->hasMany(User::class, 'cargos_id');
    }

}
