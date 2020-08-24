<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach($categories as $category)
                <div class="panel panel-default">
                    @if($category->categoryChildrent->count())
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian"
                                   href="#sportswear_{{$category->id}}">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    {{$category->name}}
                                </a>
                            </h4>
                        </div>
                    @else
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="{{route('product.category',['slug'=>$category->slug,'id'=>$category->id])}}">
                                    {{$category->name}}
                                </a>
                            </h4>
                        </div>
                    @endif
                    <div id="sportswear_{{$category->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($category->categoryChildrent as $categoryChildrent)
                                    <li>
                                        <a href="{{route('product.category',['slug'=>$categoryChildrent->slug,'id'=>$categoryChildrent->id])}}">
                                            {{$categoryChildrent->name}} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--/category-products-->
    </div>
</div>
