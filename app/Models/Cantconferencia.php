<?php

namespace App\Models;

use App\Models\Conferencia;
use Illuminate\Database\Eloquent\Model;

class Cantconferencia extends Model
{
  
	public $timestamps = false;
    
    protected $fillable = [
        'conferencias_id','limite','estado','deleted',
    ];  
    
	 public function conferencia(){
       return $this->belongsTo(Conferencia::class,'conferencias_id');
   }

}
