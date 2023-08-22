@extends('layouts.master')
@section('title', 'Anasayfa')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategoriler</div>
                    <div class="list-group categories">
                        @foreach ($categories as $category)
                            <a href="{{ route('category', $category->slug) }}" class="list-group-item">
                                <i class="fa fa-arrow-circle-o-right"></i>
                                {{ $category->category_name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for ($i = 0; $i < count($product_slider); $i++)
                            <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}"
                                class="{{ $i == 0 ? 'active' : '' }}"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach ($product_slider as $index => $product_detail)
                            <div class="item {{ $index == 0 ? 'active' : '' }}">
                                <img src="http://via.placeholder.com/640x400?text=UrunResmi" alt="...">
                                <div class="carousel-caption">
                                    {{ $product_detail->product->product_name }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading">Günün Fırsatı</div>
                    <div class="panel-body">
                        <a href="{{ route('product', $product_daily_deals->slug) }}">
                            <img src="http://via.placeholder.com/300x325?text=UrunResmi" class="img-responsive">
                            {{ $product_daily_deals->product_name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Öne Çıkan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach ($product_featured as $product_detail)
                            <div class="col-md-3 product">
                                <a href="{{ route('product', $product_detail->product->slug) }}"><img
                                        src="http://via.placeholder.com/400x400?text=UrunResmi"></a>
                                <p><a
                                        href="{{ route('product', $product_detail->product->slug) }}">{{ $product_detail->product->product_name }}</a>
                                </p>
                                <p class="price">{{ $product_detail->product->price }} ₺</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach ($product_bestseller as $product_detail)
                            <div class="col-md-3 product">
                                <a href="{{ route('product', $product_detail->product->slug) }}"><img
                                        src="http://via.placeholder.com/400x400?text=UrunResmi"></a>
                                <p><a
                                        href="{{ route('product', $product_detail->product->slug) }}">{{ $product_detail->product->product_name }}</a>
                                </p>
                                <p class="price">{{ $product_detail->product->price }} ₺</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">İndirimli Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach ($product_discounted as $product_detail)
                            <div class="col-md-3 product">
                                <a href="{{ route('product', $product_detail->product->slug) }}"><img
                                        src="http://via.placeholder.com/400x400?text=UrunResmi"></a>
                                <p><a
                                        href="{{ route('product', $product_detail->product->slug) }}">{{ $product_detail->product->product_name }}</a>
                                </p>
                                <p class="price">{{ $product_detail->product->price }} ₺</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
