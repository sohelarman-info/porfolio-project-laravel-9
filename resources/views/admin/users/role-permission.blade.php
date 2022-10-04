@extends('admin.layouts.app')
@section('title', 'Role Permission')
@section('UserManOpen', 'menu-open')
@section('UserManActive', 'active')
@section('RolePermission', 'active')
@section('content')




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        @if (session('RoleAddToPermission'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('RoleAddToPermission') }}
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
            <!-- Horizontal Form -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Roles</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ route('RoletoPermission') }}" method="POST">
                  @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Role Name</label>
                        <div class="col-sm-10">
                            <select name="role_name" class="form-control select2">
                                @foreach($roles as $role)
                                <option>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Permission Name</label>
                        <div class="col-sm-10">
                            <select name="permission_name" class="form-control select2">
                                @foreach($permissions as $permission)
                                <option>{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Role Permission</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          <!-- /.card -->
        </div>
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
                                  <th style="width: 5%" class="text-center">Serial</th>
                                  <th style="width: 40%">Roles</th>
                                  <th style="width: 40%">Permissions</th>
                                  <th style="width: 15%" class="text-center">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($roles as $key => $role)
                                <tr>
                                  <td class="text-center">{{ $loop->index + 1 }}</td>
                                  <td>{{ $role->name }}</td>
                                  <td>
                                    @foreach ($role->getPermissionNames() as $permission)
                                      <li type="1">{{ $permission }}</li>
                                    @endforeach
                                  </td>
                                  <td class="text-center">
                                    @if($role->permissions->count() == 0)
                                    @else
                                    <a href="{{ route('RolePermissionEdit', $role->id) }}" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></a>
                                    @endif
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
                {{--  <div class="card-footer clearfix">
                    {!! $permissions->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>  --}}
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
