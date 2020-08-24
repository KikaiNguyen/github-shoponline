@extends('layout.admin')

@section('title')
    <title>Edit Category</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'Category '],['key'=>'Edit'])
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('categories.update',['id' => $catFollowIdEdit->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control"
                                       name ='name' value="{{ $catFollowIdEdit->name }}">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name ='parent_id'>
                                    <option class="form-control" value="0">Chọn danh mục cha</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection

<!-- Content Wrapper. Contains page content -->

<!-- /.content-wrapper -->
