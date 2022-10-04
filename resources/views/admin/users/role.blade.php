@extends('admin.layouts.app')
@section('title', 'Role')
@section('UserManOpen', 'menu-open')
@section('UserManActive', 'active')
@section('Role', 'active')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        @if (session('RoleAdd'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('RoleAdd') }}
            </div>
        @endif
        @if (session('RoleDelete'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('RoleDelete') }}
            </div>
        @endif
      <div class="row">
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ __('Add Role') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('AddRole') }}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">{{ __('Role Name') }}</label>
                    <input type="name" name="name" class="form-control" id="exampleInputName" placeholder="Enter Role">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">{{ __('Add Role') }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Role List') }}</h3>
                </div>
                <!-- /.card -->

                <div class="card">
                <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th class="text-center" style="width: 10%">{{ __('SL') }}</th>
                            <th>{{ __('Role Name') }}</th>
                            <th>{{ __('Guard Name') }}</th>
                            <th>{{ __('Created') }}</th>
                            <th>{{ __('Updated') }}</th>
                            <th class="text-center" style="width: 20%">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}.</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td title="{{ $role->created_at->format('d M Y') }} {{ __('at ').$role->created_at->format('h:ia') }}">{{ $role->created_at->diffForHumans() }}</td>
                                <td title="{{ $role->updated_at->format('d M Y') }} {{ __('at ').$role->updated_at->format('h:ia') }}">{{ $role->updated_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('RoleEdit', $role->id) }}">
                                        <button type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <a href="{{ route('RoleDelete', $role->id) }}">
                                        <button  type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </a>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->
                <div class="card-footer clearfix">
                    {!! $roles->withQueryString()->links('pagination::bootstrap-5') !!}
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
