<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Product;


use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    public function index()
    {
        return view('basket');
    }
    public function add()
    {
        $product = Product::find(request('id'));
        $cartItem = Cart::add($product->id, $product->product_name, 1, $product->price, ['slug' => $product->slug]);

        if (auth()->check()) {
            $active_basket_id = session('active_basket_id');
            if (!isset($active_basket_id)) {
                $active_basket = Basket::create([
                    'user_id' => auth()->id()
                ]);
                $active_basket_id = $active_basket->id;
                session()->put('active_basket_id', $active_basket_id);
            }
            BasketProduct::updateOrCreate(
                ['basket_id' => $active_basket_id, 'product_id' => $product->id],
                ['piece' => $cartItem->qty, 'price' => $product->price, 'status' => 'Beklemede']
            );
        }
        return redirect()->route('basket')
            ->with('message_tur', 'success')
            ->with('message', 'Ürün sepete eklendi');
    }
    public function remove($rowId)
    {
        if (auth()->check()) {
            $active_basket_id = session('active_basket_id');
            $cartItem = Cart::get($rowId);
            BasketProduct::where('basket_id', $active_basket_id)->where('product_id', $cartItem->id)->Delete();
        }
        Cart::remove($rowId);
        return redirect()->route('basket')
            ->with('message_tur', 'success')
            ->with('message', 'Ürün sepetten kaldırıldı');
    }
    public function clear()
    {
        if (auth()->check()) {
            $active_basket_id = session('active_basket_id');
            BasketProduct::where('basket_id', $active_basket_id)->Delete();
        }
        Cart::destroy();
        return redirect()->route('basket')
            ->with('message_tur', 'success')
            ->with('message', 'Sepetiniz boşaltıldı');
    }
    public function update($rowId)
    {
        if (auth()->check()) {
            $active_basket_id = session('active_basket_id');
            $cartItem = Cart::get($rowId);

            if (request('piece') == 0) {
                BasketProduct::where('basket_id', $active_basket_id)->where('product_id', $cartItem->id)->delete();
            } else {
                BasketProduct::where('basket_id', $active_basket_id)->where('product_id', $cartItem->id)
                    ->update(['piece' => request('piece')]);
            }



        }
        Cart::update($rowId, request('price'));

        session()->flash('message_tur', 'success');
        session()->flash('message', 'Adet Bilgisi Güncellendi');

        return response()->json(['success' => true]);
    }

}
