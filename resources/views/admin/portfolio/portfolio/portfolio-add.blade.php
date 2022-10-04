@extends('admin.layouts.app')
@section('title', 'Portfolio Project Add')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Portfolio', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Portfolio Add') }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('PortfolioProjectAdd') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">{{ __('Project Name') }} </label>
                                <input type="text" id="inputName" name="name"  class="form-control @error('name') is-invalid @enderror" placeholder="Title">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">{{ __('Category') }}</label>
                                <select id="category" class="form-control select2 @error('category') is-invalid @enderror" name="category">
                                    <option selected disabled>Select one</option>
                                    @foreach ($portfoliocategory as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">{{ __('Client Company') }}</label>
                                <input type="text" id="inputClientCompany" class="form-control @error('company') is-invalid @enderror" name="company" placeholder="Company">
                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">{{ __('Project Client') }}</label>
                                <input type="text" id="inputProjectLeader" class="form-control @error('client') is-invalid @enderror" name="client" placeholder="Client Name">
                                @error('client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLink">{{ __('Project Link') }}</label>
                                <input type="text" id="inputProjectLink" class="form-control @error('url') is-invalid @enderror" name="url" placeholder="www.company.com/project">
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">{{ __('Project Description') }}</label>
                                <textarea name="text" id="my-editor" class="form-control @error('text') is-invalid @enderror" rows="4"></textarea>
                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Images') }}</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputFile">{{ __('Thumbnail') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="thumbnail" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="exampleInputFile" onchange="loadFile(event)">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('thumbnail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img class="img-thumbnail" id="output"/ width="100%">
                        </div>
                        <div class="form-group">
                            <label for="photo">Multiple Image</label>
                            <div class="input-images @error('images') is-invalid @enderror"></div>
                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">{{ __('Project Summary') }}</label>
                            <textarea name="summary" id="inputDescription" class="form-control @error('summary') is-invalid @enderror" rows="4"></textarea>
                            @error('summary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" class="btn btn-success float-right" value="Create new Porject">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
     <script>
        $('.input-images').imageUploader();
     </script>
@endsection
