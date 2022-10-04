@extends('admin.layouts.app')
@section('title', 'About Section')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('About', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10 mx-auto">
            @if (session('AboutAdd'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('AboutAdd') }}
                </div>
            @endif
            @if ($abouts->count() == 0)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('About Section') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('AboutAdd') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">{{ __('Name') }}</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">{{ __('Text') }}</label>
                      <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">{{ __('Image') }}</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="image" class="custom-file-input" id="exampleInputFile" onchange="loadFile(event)">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <img id="output"/ width="100%">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @else
            @foreach ($abouts as $about)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('About Update') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('AboutUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">{{ __('Name') }}</label>
                      <input type="hidden" name="id" value="{{ $about->id }}">
                      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="{{ $about->name }}" value="{{ $about->name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">{{ __('Text') }}</label>
                      <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10">{{ $about->text }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">{{ __('Image') }}</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="image" class="custom-file-input" id="exampleInputFile" onchange="loadFile(event)">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ asset('gallery/images/portfolio/about/images/'.$about->image) }}" class="img-thumbnail" alt="{{ $about->image }}">
                        </div>
                        <div class="col-sm-6">
                      <img class="img-thumbnail" id="output"/ width="100%">
                        </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">{{ __('Update') }}</button>
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
