<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach($products as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <a href="{{route('product.detail',['slug'=>$product->slug,'id'=>$product->id])}}">
                            <img src="{{$product->feature_image_path}}" alt=""/>
                        </a>
                        <h2>{{$product->price}}</h2>
                        <p>{{$product->name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i
                                class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>
