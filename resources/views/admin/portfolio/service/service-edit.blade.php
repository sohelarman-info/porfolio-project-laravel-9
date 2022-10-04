@extends('admin.layouts.app')
@section('title', 'Service Edit')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('ServiceSection', 'active')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        @if (session('UserUpdate'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('UserUpdate') }}
            </div>
        @endif
        @if (session('UserDeleted'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('UserDeleted') }}
            </div>
        @endif
      <div class="row">
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ __('Service Update') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('ServiceUpdate') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">{{ __('Name') }}</label>
                        <input type="hidden" name="id" value="{{ $service->id }}">
                        <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="{{ $service->name }}" value="{{ $service->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputIcon">{{ __('Icon') }}</label>
                        <input type="text" name="icon" class="form-control" id="exampleInputIcon" placeholder="{{ $service->icon }}" value="{{ $service->icon }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText">{{ __('Text') }}</label>
                        <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10">{!! $service->text !!}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">{{ __('UPDATE SECTION ITEM') }}</button>
                </div>
            </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Service Information') }}</h3>
                </div>
                <!-- /.card -->

                <div class="card">
                <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td width="5%"><i class="fas fa-user"></i></td>
                                    <td>{{ __('Username') }}</td>
                                    <td>{{ $service->name }}</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-comment-alt-lines"></i></td>
                                    <td>{{ __('Text') }}</td>
                                    <td>{!! $service->text !!}</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-info"></i></td>
                                    <td>{{ __('Icon') }}</td>
                                    <td><i class="{{ $service->icon }}"></td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-clock"></i></td>
                                    <td>{{ __('Created_at') }}</td>
                                    <td>{{ $service->created_at->format('d M Y') }} {{ __('at ').$service->created_at->format('h:ia') }} ( {{ $service->created_at->diffForHumans() }} )</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-clock"></i></td>
                                    <td>{{ __('Updated_at') }}</td>
                                    <td>{{ $service->updated_at->format('d M Y') }} {{ __('at ').$service->updated_at->format('h:ia') }} ( {{ $service->updated_at->diffForHumans() }} )</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
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
