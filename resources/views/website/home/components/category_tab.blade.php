<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($tags as $key => $tag)
                <li class="{{$key == 0 ? 'active':''}}"><a href="#tag_{{$tag->id}}" data-toggle="tab">{{$tag->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($tags as $indexTagProduct => $tagProductItem)
            <div class="tab-pane fade {{$indexTagProduct == 0 ? 'active in':''}}" id="tag_{{$tagProductItem->id}}">
            @foreach($tagProductItem->products as $productItem )
                 <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="{{route('product.detail',['slug'=>$productItem->slug,'id'=>$productItem->id])}}">
                                    <img src="{{$productItem->feature_image_path}}" alt=""/>
                                </a>
                                <h2>{{$productItem->price}}</h2>
                                <p>{{$productItem->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                 </div>
            @endforeach
            </div>

        @endforeach

    </div>
</div>
