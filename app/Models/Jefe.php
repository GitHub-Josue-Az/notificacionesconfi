<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Jefe extends Model
{
    public $timestamps = false;
    
    protected $table = 'jefes';

    protected $fillable = [
        'correo','descripcion','estado','deleted','nombres',
    ];

    public function user() {
        return $this->hasMany(User::class, 'users_id');
    } 


}
