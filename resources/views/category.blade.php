@extends('layouts.master')
@section('title', 'Kategori')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('main') }}">Anasayfa</a></li>
            <li class="active">{{ $category->category_name }}</li>
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $category->category_name }}</div>
                    <div class="panel-body">
                        <h3>Alt Kategoriler</h3>
                        <div class="list-group categories">
                            @foreach ($parent_category as $parent_categories)
                                <a href="{{ route('category', $parent_categories->slug) }}" class="list-group-item">
                                    <i class="fa fa-arrow-circle-right"></i>
                                    {{ $parent_categories->category_name }}
                                </a>
                            @endforeach
                        </div>
                        <h3>Fiyat Aralığı</h3>
                        <form>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 100-200
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 200-300
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">
                    Sırala
                    <a href="?order=coksatanlar" class="btn btn-default">Çok Satanlar</a>
                    <a href="?order=yeni" class="btn btn-default">Yeni Ürünler</a>
                    <hr>
                    <div class="row">
                        @if (count($products) == 0)
                            Henüz ürün eklenmedi...
                        @endif
                        @foreach ($products as $product)
                            <div class="col-md-3 product">
                                <a href="{{ route('product', $product->slug) }}"><img
                                        src="http://via.placeholder.com/200x200?text=UrunResmi"></a>
                                <p><a href="{{ route('product', $product->slug) }}">{{ $product->product_name }}</a></p>
                                <p class="price">{{ $product->price }} ₺</p>
                                <p><a href="#" class="btn btn-warning">Sepete Ekle</a></p>
                            </div>
                        @endforeach
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
