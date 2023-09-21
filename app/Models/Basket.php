<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Basket extends Model
{
    use HasFactory;
    protected $table = 'basket';
    protected $guarded = [];
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
    public function basket_product()
    {
        return $this->hasMany('App\Models\BasketProduct');
    }
    public function basket_product_piece()
    {
        return DB::table('basket_product')->where('basket_id', $this->id)->sum('piece');
    }

}
