<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductDetail;

class MainController extends Controller
{
    public function index()
    {
        $categories = category::whereRaw('parent_id is null')->take(8)->get();
        $product_slider = ProductDetail::with('product')->Where('show_slider', 1)->take(5)->get();
        $product_daily_deals = Product::join('product_detail', 'product_detail.product_id', 'product.id')
            ->where('product_detail.show_daily_deals', 1)
            ->first();
        $product_featured = ProductDetail::with('product')->Where('show_featured', 1)->take(4)->get();
        $product_bestseller = ProductDetail::with('product')->Where('show_bestseller', 1)->take(4)->get();
        $product_discounted = ProductDetail::with('product')->Where('show_discounted', 1)->take(4)->get();

        return view('main', compact('categories', 'product_slider', 'product_daily_deals', 'product_featured', 'product_bestseller', 'product_discounted'));
    }
}
