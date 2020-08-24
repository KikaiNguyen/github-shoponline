@extends('layout.admin')

@section('title')
    <title>Setting</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/setting/index/index.css') }}">

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Setting '],['key'=>'List'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group float-right m-2">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Add Setting
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('settings.create'). '?type=Text'}}">Text</a></li>
                                <li><a href="{{route('settings.create'). '?type=Textarea'}}">Textarea</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                                <tbody>

                            @foreach($settings as $settingItem)
                                <tr>
                                   <th scope="row">{{$settingItem->id}}</th>
                                    <td>{{$settingItem->config_key}}</td>
                                   <td>{{$settingItem->config_value}}</td>
                                    <td>
                                        <a href="{{route('settings.edit',['id'=>$settingItem->id]). '?type=' . $settingItem->type}}" class="btn btn-default">Edit</a>
                                        <a href=""data-url="{{route('settings.delete',['id'=>$settingItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                        </table>
                    </div>
                   <div class="col-md-12">
                       {{ $settings->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
