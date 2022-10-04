@extends('admin.layouts.app')
@section('title', 'Edit Education Section')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Education', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">{{ __('Edit Education Section') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('EducationSectionUpdate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $education->id }}">
                                <label for="exampleInputName">{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="{{ $education->name }}" value="{{ $education->name }}">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputText">{{ __('Text') }}</label>
                              <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10">{!! $education->text !!}</textarea>
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
