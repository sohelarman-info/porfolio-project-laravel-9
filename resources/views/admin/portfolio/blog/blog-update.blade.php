@extends('admin.layouts.app')
@section('title', 'Update blog post')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Blog', 'active')

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
                  <h3 class="card-title">{{ __('Update Blog Post') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('blog.update', $blog) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                        <label>{{ __('Blog Title:') }}</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-edit"></i></span>
                          </div>
                          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="{{ $blog->title }}" value="{{ $blog->title }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>{{ __('Category') }}</label>
                        <select name="category_id" class="form-control select2 @error('category_id') is-invalid @enderror">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ ($category->id == $blog->Category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">{{ __('Thumbnail:') }} <small>(1280x720)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="thumbnail" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="exampleInputFile"  onchange="loadFile(event)">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                            @error('thumbnail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                      <img id="output"/ width="20%">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">{{ __('Summary') }}</label>
                      <textarea class="form-control" name="description" cols="30" rows="7">{{ $blog->description }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">{{ __('Text') }}</label>
                      <textarea class="form-control" name="post" id="my-editor" cols="30" rows="20">{!! $blog->post !!}</textarea>
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
