<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'titre_en',
        'contenu',
        'contenu_en',
        'user_id',
    ];

    public function articleHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
