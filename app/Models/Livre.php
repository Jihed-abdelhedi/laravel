<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $guarded =[];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}
