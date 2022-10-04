@extends('admin.layouts.app')
@section('title', 'Study Edit')
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
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Study Edit') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('StudyUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label>Title:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-book-reader"></i></span>
                          </div>
                          <input type="hidden" name="id" value="{{ $study->id }}">
                          <input type="text" class="form-control" name="title" placeholder="{{ $study->title }}" value="{{ $study->title }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Institute Name:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                          </div>
                          <input type="text" class="form-control" name="name" placeholder="{{ $study->name }}" value="{{ $study->name }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Joining Date:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="text" name="start" class="form-control" placeholder="{{ $study->start }}" value="{{ $study->start }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Passing Date:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="text" name="end" class="form-control" placeholder="{{ $study->end }}" value="{{ $study->end }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">{{ __('Text') }}</label>
                      <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10">{!! $study->text !!}</textarea>
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
