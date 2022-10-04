@extends('admin.layouts.app')
@section('title', 'Header Section')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Header', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            @if (session('HeaderUpdate'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('HeaderUpdate') }}
                </div>
            @endif
            @if ($headers->count() == 0)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Header Option') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('PortHeaderImage') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">{{ __('Name') }}</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputTitle">{{ __('Title') }}</label>
                      <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">{{ __('Logo') }}</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="logo" class="custom-file-input" id="exampleInputFile" onchange="loadFile(event)">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <img id="output"/ width="100%">
                    </div>
                    <div class="form-group">
                        <label>{{ __('Show') }}</label>
                        <select name="status" class="form-control select2" style="width: 100%;">
                        <option value="1">Text</option>
                        <option value="2">Image</option>
                        </select>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @else
            @foreach ($headers as $header)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Header Option') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('PortHeaderImageUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">{{ __('Name') }}</label>
                      <input type="hidden" name="id" value="{{ $header->id }}">
                      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="{{ $header->name }}" value="{{ $header->name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputTitle">{{ __('Title') }}</label>
                      <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="{{ $header->title }}" value="{{ $header->title }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">{{ __('Logo') }}</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="logo" class="custom-file-input" id="exampleInputFile" onchange="loadFile(event)">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">{{ __('Current Logo') }}</h5>
                                </div>
                                <div class="card-body">
                                  <img class="img-thumbnail" src="{{ asset('gallery/images/portfolio/header/images/'.$header->logo) }}" alt="{{ $header->logo }}">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">{{ __('New Logo') }}</h5>
                                </div>
                                <div class="card-body">
                                  <img id="output"/ width="100%">
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Show') }}</label>
                        <select name="status" class="form-control select2" style="width: 100%;">
                        <option value="1" {{ ($header->status == 1) ? 'selected' : '' }}>Text</option>
                        <option value="2" {{ ($header->status == 2) ? 'selected' : '' }}>Image</option>
                        </select>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @endforeach
            @endif
        </div>
        <div class="col-md-4">
            @if (session('HeaderNavAdd'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('HeaderNavAdd') }}
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Header Navbar') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('PortHeaderNav') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">{{ __('Name') }}</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Home">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputTitle">{{ __('Link or #ID') }}</label>
                      <input type="text" name="link" class="form-control" id="exampleInputLink" placeholder="/home or #id">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputTitle">{{ __('Icon') }}</label>
                      <input type="text" name="icon" class="form-control" id="exampleInputIcon" placeholder="fa fa-home">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @if (session('HeaderNavDelete'))
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('HeaderNavDelete') }}
                </div>
            @endif
            @if($navs->count() == 0)

            @else
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Files</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>{{ __('Icon') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Link') }}</th>
                        <th>{{ __('Action') }}</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($navs as $nav)
                      <tr>
                        <td><i class="{{ $nav->icon }}"></i></td>
                        <td>{{ $nav->name }}</td>
                        <td>{{ $nav->link }}</td>
                        <td class="text-right py-0 align-middle">
                          <div class="btn-group btn-group-sm">
                            <a href="{{ route('PortHeaderNavEdit', $nav->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('PortHeaderNavDelete', $nav->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            @endif
      </div>
    </div>
  </section>
</div>
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
