<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "product";
    public function category()
    {
        return $this->belongsToMany('App\Models\Category', 'category_product');
    }
    public function detail()
    {
        return $this->hasOne('App\Models\ProductDetail');
    }
}
