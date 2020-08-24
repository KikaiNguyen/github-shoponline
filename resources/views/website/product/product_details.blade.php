@extends('layout.website')

@section('title')
    <title> Sản phẩm </title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('homepage/homepage.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('homepage/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admins/product/detail/list.css') }}">
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
                            <div class="product-details"><!--product-details-->
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="{{$products->feature_image_path}}" alt=""/>
                                        <h3>ZOOM</h3>
                                    </div>
                                    <div id="similar-product" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="productImage active">
                                                @foreach($products->images as $productImage)
                                                    <a href=""><img src="{{$productImage->image_path}}" alt=""></a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- Controls -->
                                        <a class="left item-control" href="#similar-product" data-slide="prev">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                        <a class="right item-control" href="#similar-product" data-slide="next">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>

                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                                        <h2>{{$products->name}}</h2>
                                        <p>Mã ID: {{$products->id}}</p>
                                        <img src="images/product-details/rating.png" alt=""/>

                                        <form action="" method="POST">
                                            {{ csrf_field() }}
                                            <span>
                                        <span>{{number_format($products->price)}} VNĐ</span>

                                        <label>Số lượng:</label>
                                        <input name="qty" type="number" min="1" value="1"/>
                                        <input name="productid_hidden" type="hidden" value=""/>
                                        <button type="submit" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm giỏ hàng
                                        </button>

                                    </span>
                                        </form>

                                        <p><b>Tình trạng:</b> Còn hàng</p>
                                        <p><b>Điều kiện:</b> Mơi 100%</p>
                                        <p><b>Danh mục:</b> {{$products->category->name}}</p>


                                    </div><!--/product-information-->
                                </div>
                            </div>

                            <div class="category-tab shop-details-tab"><!--category-tab-->
                                <div class="col-sm-12">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
                                        <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="details">
                                        {{$products->content}}
                                    </div>

                                    <div class="tab-pane fade" id="reviews">
                                        <div class="col-sm-12">
                                            <ul>
                                                <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                                <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                                <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                                labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                                laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in
                                                voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            <p><b>Write Your Review</b></p>

                                            <form action="#">
                                            <span>
                                                <input type="text" placeholder="Your Name"/>
                                                <input type="email" placeholder="Email Address"/>
                                            </span>
                                                <textarea name=""></textarea>
                                                <button type="button" class="btn btn-default pull-right">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

{{--                        <div class="recommended_items"><!--recommended_items-->--}}
{{--                            <h2 class="title text-center">Sản phẩm liên quan</h2>--}}

{{--                            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">--}}
{{--                                <div class="carousel-inner">--}}
{{--                                    <div class="item active">--}}
{{--                                        @foreach($products->category_id as $categoryId)--}}
{{--                                            @foreach($categoryId->productRelateds as $productRelated)--}}
{{--                                            <div class="col-sm-4">--}}
{{--                                                <div class="product-image-wrapper">--}}
{{--                                                    <div class="single-products">--}}
{{--                                                        <div class="productinfo text-center">--}}
{{--                                                            <img src="{{$productRelated->feature_image_path}}"--}}
{{--                                                                 alt=""/>--}}
{{--                                                            <h2>{{number_format($productRelated->price)}}</h2>--}}
{{--                                                            <p>{{$productRelated->name}}</p>--}}
{{--                                                            <a href="#" class="btn btn-default add-to-cart"><i--}}
{{--                                                                    class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            @endforeach--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">--}}
{{--                                    <i class="fa fa-angle-left"></i>--}}
{{--                                </a>--}}
{{--                                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">--}}
{{--                                    <i class="fa fa-angle-right"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div><!--/recommended_items-->--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<section>

</section>

