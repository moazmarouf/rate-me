<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function additions(){
        return $this->hasMany(Addition::class);
    }


}
