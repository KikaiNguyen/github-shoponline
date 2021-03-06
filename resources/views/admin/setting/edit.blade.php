@extends('layout.admin')

@section('title')
    <title>Setting</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'Setting '],['key'=>'Edit'])
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('settings.update',['id' => $setting->id]) . '?type=' . $setting->type}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Config Key</label>
                                <input type="text"
                                        class="form-control @error('config_value') is-invalid @enderror"
                                        name ='config_key' value="{{$setting->config_key}}"
                                        placeholder="Nhập config key">
                            </div>

                            @if(request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <input type="text"
                                           class="form-control @error('config_value') is-invalid @enderror"
                                           name="config_value" value="{{$setting->config_value}}"
                                           placeholder="Nhập config value"
                                    >
{{--                                    @error('config_value')--}}
{{--                                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                    @enderror--}}
                                </div>
                                @elseif(request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <textarea
                                           class="form-control @error('config_value') is-invalid @enderror"
                                           name="config_value"
                                           placeholder="Nhập config value"
                                           rows="5"
                                    >{{$setting->config_value}}</textarea>
{{--                                    @error('config_value')--}}
{{--                                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                    @enderror--}}
                                </div>

                            @endif

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
