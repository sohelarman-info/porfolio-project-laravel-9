@extends('admin.layouts.app')
@section('title', 'User Permission Edit')
@section('UserManOpen', 'menu-open')
@section('UserManActive', 'active')
@section('UserPermission', 'active')
@section('content')

<style>
    /* The container */
    .container {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 16px;
      font-weight: normal;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked ~ .checkmark {
      background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
      left: 9px;
      top: 5px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }
</style>


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
        <form action="{{ route('UpdateUserPermissions') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title text-center">Edit Permission of {{ $user->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10%" class="text-center">Serial</th>
                            <th style="width: 10%" class="text-center"><input type="checkbox" id="checkAll"></th>
                            <th style="width: 30%">Name</th>
                            <th class="text-center" style="width: 25%">Created</th>
                            <th class="text-center" style="width: 25%">Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $key => $permission)
                        <tr>
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td class="text-center"><input type="checkbox" name="permission[]" value="{{ $permission->name }}" {{ $user->hasPermissionTo($permission->name) ? "checked" : '' }}></td>
                            <td>{{ $permission->name }}</td>
                            <td class="text-center">{{ $permission->created_at->format('d M Y') }}</td>
                            <td class="text-center">{{ $permission->updated_at->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="card-footer text-center clearfix">
                        <input class="btn btn-primary" type="submit" value="Update Permission">
                    </div>
                </div>
                <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
