<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug_kategoriadi)
    {
        $category = Category::where('slug', $slug_kategoriadi)->firstOrFail();
        $parent_category = Category::where('parent_id', $category->id)->get();

        $order = request('order');
        if ($order == 'coksatanlar') {

            $products = $category->product()
                ->distinct()
                ->join('product_detail', 'product_detail.product_id', '=', 'product_detail.product_id')
                ->orderBy('product_detail.show_bestseller', 'desc')
                ->simplePaginate(2);

        } else if ($order == 'yeni') {
            $products = $category->product()->orderByDesc('updated_at')->paginate(2);
        } else {
            $products = $category->product()->paginate(2);
        }


        return view('category', compact('category', 'parent_category', 'products'));
    }
}
