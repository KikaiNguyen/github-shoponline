<!-- Content Wrapper. Contains page content -->

<!-- /.content-wrapper -->


@extends('layout.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'Product '],['key'=>'Add'])
{{--        <div class="col-md-12">--}}
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                </div>
                <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" name='name'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" class="form-control" name='price'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh đại diện</label>
                                <input type="file" class="form-control-file " name='feature_image_path'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh Chi Tiết</label>
                                <input type="file" multiple class="form-control-file " name='image_path[]'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn Danh Mục</label>
                                <select class="form-control select2_init" name='category_id'>
                                    <option class="form-control" value="0">Chọn Danh Mục</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập tags cho sản phẩm</label>
                                <select class="form-control tag_select_choose" name="tags[]" multiple="multiple">
                                    <option class="form-control" value="0"></option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Nhập một nội dung</label>
                        <textarea class="form-control tinymce_editor_init" name="contents" rows="7"></textarea>
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
