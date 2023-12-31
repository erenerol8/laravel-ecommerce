@extends('layouts.master')
@section('title', 'Sepet')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            @include('layouts.partials.alert')

            @if (count(Cart::content()) > 0)
                <table class="table table-bordererd table-hover">
                    <tr>
                        <th colspan="2">Ürün</th>
                        <th>Adet Fiyatı</th>
                        <th>Adet</th>
                        <th>Tutar</th>
                    </tr>
                    @foreach (Cart::content() as $productCartItem)
                        <tr>
                            <td style="width:120px">
                                <img src="http://via.placeholder.com/120x100?text=UrunResmi">
                            </td>
                            <td>{{ $productCartItem->name }}</td>
                            <form action="{{ route('basket.remove', $productCartItem->rowId) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger btn-xs" value="Sepetten Kaldır">
                            </form>
                            <td>{{ $productCartItem->price }} ₺</td>
                            <td>
                                <a href="#" class="btn btn-xs btn-default product-price-discrement"
                                    data-id="{{ $productCartItem->rowId }}"
                                    data-price="{{ $productCartItem->qty - 1 }}">-</a>
                                <span style="padding: 10px 20px">{{ $productCartItem->qty }}</span>
                                <a href="#" class="btn btn-xs btn-default product-price-increment"
                                    data-id="{{ $productCartItem->rowId }}"
                                    data-price="{{ $productCartItem->qty + 1 }}">+</a>
                            </td>
                            <td class="text-right">
                                {{ $productCartItem->subtotal }}₺
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="4" class="text-right">Alt Toplam</th>
                        <td class="text-right">{{ Cart::subtotal() }} ₺</td>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">KDV</th>
                        <td class="text-right">{{ Cart::tax() }} ₺</td>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Genel Toplam</th>
                        <td class="text-right">{{ Cart::total() }} ₺</td>
                        <th></th>
                    </tr>
                </table>

                <form action="{{ route('basket.clear') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-info pull-left" value="Sepeti Boşalt">
                </form>
                <a href="{{ route('payment') }}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
            @else
                <p>sepetinizde ürün yok</p>
            @endif
        </div>
    </div>
@endsection
