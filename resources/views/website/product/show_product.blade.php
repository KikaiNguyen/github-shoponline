@extends('layout.website')

@section('title')
    <title> Sản phẩm </title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('homepage/homepage.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('homepage/index.css') }}">
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <!--category-products-->
            @include('website.components.category')
            <!--/category-products-->
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Sản Phẩm</h2>
                        @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{route('product.detail',['slug'=>$product->slug,'id'=>$product->id])}}"><img src="{{$product->feature_image_path}}" alt="" /></a>
                                        <h2>{{number_format($product->price)}} VNĐ</h2>
                                        <p>{{$product->name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="features_items"><!--features_items-->
                        <div class="col-sm-4">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
