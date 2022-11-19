<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $primaryKey = "user_id";
    protected $fillable = [
        "user_id",
        "adress",
        "phone",
        "birthdate",
        "ville_id",
    ];

    public function etudiantHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    
}
