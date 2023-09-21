@extends('layouts.master')
@section('title', 'Sipariş Detayı')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sipariş (SP-{{ $order->id }})</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    <th>Ara Toplam</th>
                    <th>Durum</th>
                </tr>
                @foreach ($order->basket->basket_product as $basket_product)
                    <tr>
                        <td style="width:120px">
                            <img src="http://via.placeholder.com/120x100?text=UrunResmi">
                        </td>
                        <td>{{ $basket_product->product->product_name }}</td>
                        <td>{{ $basket_product->price }}</td>
                        <td>{{ $basket_product->piece }}</td>
                        <td>{{ $basket_product->price * $basket_product->piece }}</td>
                        <td>{{ $basket_product->status }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Toplam Tutar</th>
                    <th colspan="2">{{ $order->order_price }}</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Toplam Tutar (KDV'li)</th>
                    <th colspan="2">{{ $order->order_price * ((100 + Config('cart.tax')) / 100) }}</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Sipariş Durumu</th>
                    <th colspan="2">{{ $order->status }}</th>
                </tr>
            </table>
        </div>
    </div>
@endsection
