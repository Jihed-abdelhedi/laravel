<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['nom_categorie'];

    public function livres(){
        return $this->hasMany(Livre::class);
    }


    use HasFactory;
}
