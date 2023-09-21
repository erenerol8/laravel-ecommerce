@extends('layouts.master')
@section('title', 'Siparişler')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Siparişler</h2>
            @if (count($orders) == 0)
                <p>Henüz siparişiniz yok</p>
            @else
                <table class="table table-bordererd table-hover">
                    <tr>
                        <th>Sipariş Kodu</th>
                        <th>Tutar</th>
                        <th>Toplam Ürün</th>
                        <th>Durum</th>
                        <th></th>
                    </tr>
                    @foreach ($orders as $order)
                        <tr>
                            <td>SP{{ $order->id }}</td>
                            <td>{{ $order->order_price * ((100 + config('cart.tax')) / 100) }}</td>
                            <td>{{ $order->basket->basket_product_piece() }}</td>
                            <td>{{ $order->status }}</td>
                            <td><a href="{{ route('detail', $order->id) }}" class="btn btn-sm btn-success">Detay</a></td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
