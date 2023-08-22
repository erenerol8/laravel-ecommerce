<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'category';

    use SoftDeletes;
    use HasFactory;
    public function product()
    {
        return $this->belongsToMany('App\Models\Product', 'category_product');
    }
}
