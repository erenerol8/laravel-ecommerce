<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductDetail extends Model
{
    protected $table = "product_detail";
    public $timestamps = false; //CreateDate gibi özellikler kullanılmayacak
    use HasFactory;
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
