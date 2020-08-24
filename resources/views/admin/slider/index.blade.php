@extends('layout.admin')

@section('title')
    <title>Slider</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Slider '],['key'=>'List'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('sliders.create')}}" class="btn btn-success float-right m-2">add</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Slider</th>
                                <th scope="col">Description</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sliders as $sliderItem)
                                <tr>
                                    <th scope="row">{{$sliderItem->id}}</th>
                                    <td>{{$sliderItem->name}}</td>
                                    <td>{{$sliderItem->description}}</td>
                                    <td> <img class="product_image_150_100"
                                              src="{{$sliderItem->image_path}}" alt ="">
                                    </td>
                                    <td>
                                        <a href="{{route('sliders.edit',['id'=>$sliderItem->id])}}" class="btn btn-default">Edit</a>
                                        <a href=""data-url="{{route('sliders.delete',['id'=>$sliderItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
