@extends('admin.layouts.app')
@section('title', 'Portfolio Category Edit')
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
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ __('Category Update') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('PortCategoryUpdate') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">{{ __('Name') }}</label>
                        <input type="hidden" name="id" value="{{ $portfoliocategory->id }}">
                        <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="{{ $portfoliocategory->name }}" value="{{ $portfoliocategory->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputIcon">{{ __('Icon') }}</label>
                        <input type="text" name="icon" class="form-control" id="exampleInputIcon" placeholder="{{ $portfoliocategory->icon }}" value="{{ $portfoliocategory->icon }}">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">{{ __('UPDATE') }}</button>
                </div>
            </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Category Information') }}</h3>
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
                                    <td>{{ $portfoliocategory->name }}</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-info"></i></td>
                                    <td>{{ __('Icon') }}</td>
                                    <td><i class="{{ $portfoliocategory->icon }}"></td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-clock"></i></td>
                                    <td>{{ __('Created_at') }}</td>
                                    <td>{{ $portfoliocategory->created_at->format('d M Y') }} {{ __('at ').$portfoliocategory->created_at->format('h:ia') }} ( {{ $portfoliocategory->created_at->diffForHumans() }} )</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-clock"></i></td>
                                    <td>{{ __('Updated_at') }}</td>
                                    <td>{{ $portfoliocategory->updated_at->format('d M Y') }} {{ __('at ').$portfoliocategory->updated_at->format('h:ia') }} ( {{ $portfoliocategory->updated_at->diffForHumans() }} )</td>
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
