<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug_urunadi)
    {
        $product = Product::whereSlug($slug_urunadi)->firstOrFail();
        return view('product', compact('product'));
    }
    public function search()
    {
        $search = request()->input('aranan');
        $products = Product::where('product_name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->paginate(8);
        return view('search', compact('products'));
    }

}
