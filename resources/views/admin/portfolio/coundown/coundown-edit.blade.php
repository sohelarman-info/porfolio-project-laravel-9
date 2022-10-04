@extends('admin.layouts.app')
@section('title', 'Coundown Section')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Coundown', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">{{ __('Coundown Item') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('CoundownUpdate') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="id"value="{{ $coundown->id }}">
                            <label for="exampleInputIcon">{{ __('Icon') }}</label>
                            <input type="text" name="icon" class="form-control" id="exampleInputIcon" placeholder="{{ $coundown->icon }}" value="{{ $coundown->icon }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">{{ __('Count Item') }}</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="{{ $coundown->name }}" value="{{ $coundown->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText">{{ __('Text') }}</label>
                            <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10">{{ $coundown->text }}</textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-success">{{ __('UPDATE') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            @if (session('CoundownAdd'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('CoundownAdd') }}
                </div>
            @endif
            @if (session('CoundownDelete'))
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('CoundownDelete') }}
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Coundown Item Details') }}</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <table class="table table-striped projects">
                      <tbody>
                        <tr>
                            <td><b>{{ __('Icon') }}</b></td>
                            <td>{{ $coundown->Icon }}</td>
                        </tr>
                        <tr>
                            <td><b>{{ __('Count') }}</b></td>
                            <td>{{ $coundown->name }}</td>
                        </tr>
                        <tr>
                            <td><b>{{ __('Text') }}</b></td>
                            <td>{!! $coundown->text !!}</td>
                        </tr>
                        <tr>
                            <td><b>{{ __('Created at') }}</b></td>
                            <td title="{{ $coundown->created_at->format('d.m.Y') }}">{{ $coundown->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <td><b>{{ __('Created at') }}</b></td>
                            <td title="{{ $coundown->updated_at->format('d.m.Y') }}">{{ $coundown->updated_at->diffForHumans() }}</td>
                        </tr>
                      </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
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
