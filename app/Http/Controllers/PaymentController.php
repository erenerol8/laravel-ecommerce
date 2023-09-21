<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class PaymentController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {

            return redirect()->route('user.login')
                ->with('message_tur', 'info')
                ->with('message', 'Ödeme işlemi için oturum açmanız veya kullanıcı kaydı yapmanız gerekmektedir.');

        } else if (count(Cart::content()) == 0) {

            return redirect()->route('main')
                ->with('message_tur', 'info')
                ->with('message', 'Ödeme işlemi için sepetinizde bir ürün bulunmalıdır.');
        }
        $user_detail = auth()->user()->detail;
        return view('payment', compact('user_detail'));
    }
    public function payment_process()
    {
       $randomOrderId = mt_rand(100000, 999999);
        $order = request()->all();
        $order['order_id'] = $randomOrderId;
        $order['basket_id'] = session('active_basket_id');
        $order['bank'] = "Garanti";
        $order['installments'] = 1;
        $order['status'] = 'Siparişiniz alındı';
        $order['order_price'] = Cart::subtotal();

        Order::create($order);

        Cart::destroy();
        session()->forget('active_basket_id');

        return redirect()->route('order')
            ->with('message_tur', 'success')
            ->with('message', 'Ödemeniz başarılı bir şekilde gerçekleştirildi.');

    }
}
