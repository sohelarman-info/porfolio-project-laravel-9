@extends('admin.layouts.app')
@section('title', 'User List')
@section('UserManOpen', 'menu-open')
@section('UserManActive', 'active')
@section('User', 'active')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        @if (session('AddUser'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('AddUser') }}
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
                <h3 class="card-title">{{ __('Add User') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('AddUser') }}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('User Name') }}</label>
                    <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('Email address') }}</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">{{ __('Add User') }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('User List') }}</h3>
                </div>
                <!-- /.card -->

                <div class="card">
                <!-- /.card-header -->
                    <div class="card-body p-0">
                        @if ($users->count() == 0)
                            <div class="text-center">{{ __('You have no users') }}</div>
                        @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th class="text-center" style="width: 10%">{{ __('SL') }}</th>
                                <th>{{ __('Username') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Created') }}</th>
                                <th class="text-center" style="width: 20%">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}.</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td title="{{ $user->updated_at->format('d M Y') }} {{ __('at ').$user->updated_at->format('h:ia') }}">{{ $user->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('UserEdit', $user->id) }}">
                                            <button type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></button>
                                        </a>
                                        <a href="{{ route('UserDeleted', $user->id) }}">
                                            <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
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
                    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
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
