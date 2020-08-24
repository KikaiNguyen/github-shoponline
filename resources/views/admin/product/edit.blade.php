<!-- Content Wrapper. Contains page content -->

<!-- /.content-wrapper -->


@extends('layout.admin')

@section('title')
    <title>Edit Product</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'Product '],['key'=>'Add'])
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                </div>
                <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" name ='name' value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" class="form-control" name ='price' value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh đại diện</label>
                                <input type="file" class="form-control-file " name ='feature_image_path'>
                                <div class="col-md-12">
                                    <div class="row">
                                        <img class="product_image_150_100" src="{{$product->feature_image_path}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh Chi Tiết</label>
                                <input type="file" multiple class="form-control-file " name ='image_path[]'>
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach($product->images as $productImageItem)
                                            <div class="col-md-3">
                                                <img class="product_image_detail" src="{{$productImageItem->image_path}}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn Danh Mục</label>
                                <select class="form-control select2_init" name ='category_id'>
                                    <option class="form-control" value="0">Chọn Danh Mục</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập tags cho sản phẩm</label>
                                <select class="form-control tag_select_choose" name="tags[]" multiple="multiple">
                                    @foreach($product->tag as $tagItem)
                                        <option value="{{$tagItem->name}}" selected>{{ $tagItem->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12" >
                        <label >Nhập một nội dung</label>
                        <textarea class="form-control tinymce_editor_init" name="contents" rows="7">{{$product->content}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>

@endsection

<!-- Content Wrapper. Contains page content -->

<!-- /.content-wrapper -->
