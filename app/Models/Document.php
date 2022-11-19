<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        "titre",
        "titre_en",
        "user_id",
        "document_path"
    ];

    public function documentHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
