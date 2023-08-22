@extends('layouts.master')
@section('title', $product->product_name)
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Anasayfa</a></li>
            @foreach ($product->category()->distinct()->get() as $categories)
                <li><a href="{{ route('category', $categories->slug) }}">{{ $categories->category_name }}</a></li>
            @endforeach
            <li class="active">{{ $product->product_name }}</li>
        </ol>
        <div class="bg-content">
            <div class="row">
                <div class="col-md-5">
                    <img src="http://via.placeholder.com/400x350?text=UrunResmi">
                    <hr>
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img
                                    src="http://via.placeholder.com/60x60?text=UrunResmi"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img
                                    src="http://via.placeholder.com/60x60?text=UrunResmi"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img
                                    src="http://via.placeholder.com/60x60?text=UrunResmi"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h1>{{ $product->product_name }}</h1>
                    <p class="price">{{ $product->price }} ₺</p>
                    <p><a href="#" class="btn btn-warning">Sepete Ekle</a></p>
                </div>
            </div>

            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#t1" data-toggle="tab">Ürün Açıklaması</a></li>
                    <li role="presentation"><a href="#t2" data-toggle="tab">Yorumlar</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="t1">
                        {{ $product->description }}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="t2">
                        Henüz yorum yapılmadı...
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
