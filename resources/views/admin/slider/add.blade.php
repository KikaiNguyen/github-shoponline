<!-- Content Wrapper. Contains page content -->

<!-- /.content-wrapper -->


@extends('layout.admin')

@section('title')
    <title>Add Slider</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'Slider '],['key'=>'Add'])
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                </div>
                <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên slider</label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               placeholder="Nhập tên"
                               value="{{ old('name') }}"
                        >
{{--                        @error('name')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>

                    <div class="form-group">
                        <label>Mô tả slider</label>

                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            name="description" rows="4">{{ old('description') }}</textarea>
{{--                        @error('description')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>

                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file"
                               class="form-control-file @error('image_path') is-invalid @enderror"
                               name="image_path">
{{--                        @error('image_path')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
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
