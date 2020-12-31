<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Imagecumple extends Model
{
    
    

    protected $fillable = [
        'id','image','estado','deleted',
    ];

   public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }




}
