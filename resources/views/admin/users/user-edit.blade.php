@extends('admin.layouts.app')
@section('title', 'User Update')
@section('UserManOpen', 'menu-open')
@section('UserManActive', 'active')
@section('User', 'active')
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
                <h3 class="card-title">{{ __('Update User') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('UpdateUser') }}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('User Name') }}</label>
                    <input type="hidden" name="id" value="{{ $user->id }}" id="{{ $user->id }}">
                    <input type="name" name="name" class="form-control" id="exampleInputEmail1" value="{{ $user->name }}" placeholder="{{ $user->name }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('Email address') }}</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email }}" placeholder="{{ $user->email }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{ $user->password }}" placeholder="{{ $user->password }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">{{ __('Update User') }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('User Information') }}</h3>
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
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-at"></i></td>
                                    <td>{{ __('Email') }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-shield-alt"></i></td>
                                    <td>{{ __('Roles') }}</td>
                                    <td>
                                        @foreach ($user->getRoleNames() as $role)
                                        <li type="1">{{ $role }}</li>
                                        @endforeach
                                    </td>

                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-user-shield"></i></i></td>
                                    <td>{{ __('Permission') }}</td>
                                    <td>
                                        @foreach ($user->getAllPermissions() as $permission)
                                        <li type="1">{{ $permission->name }}</li>
                                        @endforeach
                                    </td>

                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-clock"></i></td>
                                    <td>{{ __('Created_at') }}</td>
                                    <td>{{ $user->created_at->format('d M Y') }} {{ __('at ').$user->created_at->format('h:ia') }} ( {{ $user->created_at->diffForHumans() }} )</td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fas fa-clock"></i></td>
                                    <td>{{ __('Updated_at') }}</td>
                                    <td>{{ $user->updated_at->format('d M Y') }} {{ __('at ').$user->updated_at->format('h:ia') }} ( {{ $user->updated_at->diffForHumans() }} )</td>
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
