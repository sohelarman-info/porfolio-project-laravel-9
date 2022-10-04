@extends('admin.layouts.app')
@section('title', 'Permission Edit')
@section('UserManOpen', 'menu-open')
@section('UserManActive', 'active')
@section('Permission', 'active')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        @if (session('UpdatePermission'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('UpdatePermission') }}
            </div>
        @endif
      <div class="row">
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ __('Update Permission') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('UpdatePermission') }}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('Permission Name') }}</label>
                    <input type="hidden" name="id" value="{{ $permission->id }}" id="{{ $permission->id }}">
                    <input type="name" name="name" class="form-control" id="exampleInputEmail1" value="{{ $permission->name }}" placeholder="{{ $permission->name }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">{{ __('Update Permission') }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Permission Information') }}</h3>
                </div>
                <!-- /.card -->

                <div class="card">
                <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td width="5%"><i class="fas fa-shield-alt"></td>
                                    <td>{{ __('Permission Name') }}</td>
                                    <td>{{ $permission->name }}</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-user-shield"></i></td>
                                    <td>{{ __('Guard Name') }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-clock"></i></td>
                                    <td>{{ __('Created_at') }}</td>
                                    <td>{{ $permission->created_at->format('d M Y') }} {{ __('at ').$permission->created_at->format('h:ia') }} ( {{ $permission->created_at->diffForHumans() }} )</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-clock"></i></td>
                                    <td>{{ __('Updated_at') }}</td>
                                    <td>{{ $permission->updated_at->format('d M Y') }} {{ __('at ').$permission->updated_at->format('h:ia') }} ( {{ $permission->updated_at->diffForHumans() }} )</td>
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
