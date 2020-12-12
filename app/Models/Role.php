<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   public $timestamps = false;

   protected $table = 'roles';
    
    protected $fillable = [
        'title',
    ];  
    
	 public function user(){
       return $this->hasMany(User::class,'roles_id');
   }
}
