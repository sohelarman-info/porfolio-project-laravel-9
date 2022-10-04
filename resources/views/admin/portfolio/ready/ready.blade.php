@extends('admin.layouts.app')
@section('title', 'Ready Section')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Ready', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10 mx-auto">
            @if (session('Add'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('Add') }}
                </div>
            @endif
            @if ($readysection->count() == 0)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Ready Section') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('ReadyAdd') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">{{ __('Title') }}</label>
                      <input type="text" name="title" class="form-control" id="exampleInputName" placeholder="I'M READY FOR YOUR NEXT PROJECT">
                    </div>
                    <div class="row">
                        <div class="col-md 6">
                            <div class="form-group">
                                <label for="exampleInputIcon">{{ __('Icon') }}</label>
                                <input type="text" name="icon" class="form-control" id="exampleInputIcon" placeholder="fa fa-address-book">
                            </div>
                        </div>
                        <div class="col-md 6">
                            <div class="form-group">
                                <label for="exampleInputButton">{{ __('Button') }}</label>
                                <input type="text" name="button" class="form-control" id="exampleInputButton" placeholder="Hire Me">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">{{ __('Text') }}</label>
                      <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @else
            @foreach ($readysection as $ready)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Ready Section') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('ReadyUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">{{ __('Title') }}</label>
                      <input type="hidden" name="id" value="{{ $ready->id }}">
                      <input type="text" name="title" class="form-control" id="exampleInputName" placeholder="{{ $ready->title }}" value="{{ $ready->title }}">
                    </div>
                    <div class="row">
                        <div class="col-md 6">
                            <div class="form-group">
                                <label for="exampleInputIcon">{{ __('Icon') }}</label>
                                <input type="text" name="icon" class="form-control" id="exampleInputIcon" placeholder="{{ $ready->icon }}" value="{{ $ready->icon }}">
                            </div>
                        </div>
                        <div class="col-md 6">
                            <div class="form-group">
                                <label for="exampleInputButton">{{ __('Button') }}</label>
                                <input type="text" name="button" class="form-control" id="exampleInputButton" placeholder="{{ $ready->button }}" value="{{ $ready->button }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">{{ __('Text') }}</label>
                      <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10">{!! $ready->text !!}</textarea>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @endforeach
            @endif
        </div>
    </div>
  </section>
</div>
@endsection
@section('footer_js')
<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace('my-editor', options);
  </script>
  <script>
      var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
    </script>
@endsection
