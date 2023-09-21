<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "order";
    protected $fillable = [
                          'basket_id', 'order_price', 'status',
                          'firstname_lastname', 'address', 'phone_number', 'mobil_number', 'bank', 'installments',
                          ];

    public function basket()
    {
        return $this->belongsTo('App\Models\Basket');
    }
}
