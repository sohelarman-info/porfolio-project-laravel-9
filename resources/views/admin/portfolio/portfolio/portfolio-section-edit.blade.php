@extends('admin.layouts.app')
@section('title', 'Portfolio Section')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Portfolio', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10 mx-auto">
            @if (session('ServicesAdd'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('ServicesAdd') }}
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Portfolio Section Update') }}</h3>
                </div>
                <!-- form start -->
                <form action="{{ route('PortfolioSectionUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">{{ __('Name') }}</label>
                      <input type="hidden" name="id" value="{{ $portfoliosection->id }}">
                      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="{{ $portfoliosection->name }}" value="{{ $portfoliosection->name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">{{ __('Text') }}</label>
                      <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10">{{ $portfoliosection->text }}</textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">{{ __('UPDATE') }}</button>
                  </div>
                </form>
            </div>
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
