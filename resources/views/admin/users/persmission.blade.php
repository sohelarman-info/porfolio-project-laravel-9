@extends('admin.layouts.app')
@section('title', 'Permission')
@section('UserManOpen', 'menu-open')
@section('UserManActive', 'active')
@section('Permission', 'active')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        @if (session('AddPermission'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('AddPermission') }}
            </div>
        @endif
        @if (session('DeletePermission'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('DeletePermission') }}
            </div>
        @endif
      <div class="row">
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ __('Add Permission') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('AddPermission') }}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">{{ __('Permission Name') }}</label>
                    <input type="name" name="name" class="form-control" id="exampleInputName" placeholder="Enter Permission">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">{{ __('Add Permission') }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Permission List') }}</h3>
                </div>
                <!-- /.card -->

                <div class="card">
                <!-- /.card-header -->
                    <div class="card-body p-0">
                        @if ($permissions->count() == 0)
                            <div class="text-center p-10">{{ __('You have no Permission') }}</div>
                        @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th class="text-center" style="width: 10%">{{ __('SL') }}</th>
                                <th>{{ __('Permission Name') }}</th>
                                <th>{{ __('Guard Name') }}</th>
                                <th>{{ __('Created') }}</th>
                                <th class="text-center" style="width: 20%">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $key => $permission)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}.</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                    <td>{{ $permission->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('PermissionEdit', $permission->id) }}">
                                            <button type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></button>
                                        </a>
                                        <a href="{{ route('DeletePermission', $permission->id) }}">
                                            <button  type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        @endif
                    </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->
                <div class="card-footer clearfix">
                    {!! $permissions->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
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
