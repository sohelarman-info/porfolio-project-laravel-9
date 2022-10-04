@extends('admin.layouts.app')
@section('title', 'Header Navbar Edit')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Header', 'active')
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
                <h3 class="card-title">{{ __('Navbar Update') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('PortHeaderNavUpdate') }}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('Name') }}</label>
                    <input type="hidden" name="id" value="{{ $nav->id }}">
                    <input type="text" name="name" class="form-control" id="exampleInputName" value="{{ $nav->name }}" placeholder="{{ $nav->name }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('Link') }}</label>
                    <input type="text" name="link" class="form-control" id="exampleInputLink" value="{{ $nav->link }}" placeholder="{{ $nav->link }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('Icon') }}</label>
                    <input type="text" name="icon" class="form-control" id="exampleInputIcon" value="{{ $nav->icon }}" placeholder="{{ $nav->icon }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">{{ __('Header Navbar Update') }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Header Navbar Information') }}</h3>
                </div>
                <!-- /.card -->

                <div class="card">
                <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td width="5%"><i class="fas fa-info"></i></td>
                                    <td>{{ __('Icon') }}</td>
                                    <td><i class="{{ $nav->icon }}"></td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-folder"></i></td>
                                    <td>{{ __('Name') }}</td>
                                    <td>{{ $nav->name }}</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-at"></i></td>
                                    <td>{{ __('Link') }}</td>
                                    <td>{{ $nav->link }}</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-clock"></i></td>
                                    <td>{{ __('Created_at') }}</td>
                                    <td>{{ $nav->created_at->format('d M Y') }} {{ __('at ').$nav->created_at->format('h:ia') }} ( {{ $nav->created_at->diffForHumans() }} )</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-clock"></i></td>
                                    <td>{{ __('Updated_at') }}</td>
                                    <td>{{ $nav->updated_at->format('d M Y') }} {{ __('at ').$nav->updated_at->format('h:ia') }} ( {{ $nav->updated_at->diffForHumans() }} )</td>
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
<!-- /.content-wrapper -->


@endsection
