<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded =[];
    public function User(){
        return $this->belongsTo('App/Models/User');
    }

    public function Product(){
        return $this->hasMany('App/Models/Product');
    }
}
