@extends('layouts.master')
@section('content')
    <div class="container">

        <ol class="breadcumb">
            <li><a href="{{ route('main') }}"> Anasayfa</a> </li>
            <li class="active">Arama sonucu</li>
        </ol>

        <div class="products bg-content">
            <div class="row">
                @if (count($products) == 0)
                    <div class="col-md-12 text-center">
                        Bir ürün bulunamadı
                    </div>
                @endif
                @foreach ($products as $product)
                    <div class="col-md-3 product">
                        <a href="{{ route('product', $product->slug) }}">
                            <img src="http://via.placeholder.com/640x400?text=UrunResmi" alt="{{ $product->product_name }}">
                        </a>
                        <p>
                            <a href="{{ route('product', $product->product_name) }}">
                                {{ $product->product_name }}
                            </a>
                        </p>
                        <p class="price"> {{ $product->price }}₺</p>
                    </div>
                @endforeach
            </div>
            {{ $products->appends(['aranan' => old('aranan')])->links() }}
        </div>
    </div>
@endsection
