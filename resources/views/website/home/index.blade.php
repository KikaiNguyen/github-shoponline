@extends('layout.website')

@section('title')
    <title> Home Page</title>
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

                    <!--features_items-->
                    @include('website.home.components.features_items')
                    <!--/features_items-->

                    <!--category-tab-->
                    @include('website.home.components.category_tab')
                    <!--/category-tab-->

                    <!--recommended_items-->
                   @include('website.home.components.recommended_items')
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection
