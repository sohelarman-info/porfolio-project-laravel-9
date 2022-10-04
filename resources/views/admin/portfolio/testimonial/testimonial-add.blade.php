@extends('admin.layouts.app')
@section('title', 'Add Testimonial')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Testimonials', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10 mx-auto">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Add Testimonial') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('Testimonialstore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label>{{ __('Name:') }}</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <input type="text" class="form-control" name="name" placeholder="Jonior Smith">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>{{ __('Title:') }}</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                          </div>
                          <input type="text" class="form-control" name="title" placeholder="Web Developer">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>{{ __('Rating') }}</label>
                            <select name="star" class="form-control select2">
                                <option value="1">One Star</option>
                                <option value="2">Two Star</option>
                                <option value="3">Three Star</option>
                                <option value="4">Four Star</option>
                                <option value="5">Five Star</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">{{ __('Image:') }}</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile"  onchange="loadFile(event)">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      <img id="output"/ width="20%">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">{{ __('Text') }}</label>
                      <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">{{ __('SUBMIT') }}</button>
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
