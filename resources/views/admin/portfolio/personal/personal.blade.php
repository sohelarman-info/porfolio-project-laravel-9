@extends('admin.layouts.app')
@section('title', 'Personal Area')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('PersonalArea', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            @if (session('PersonalAdd'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('PersonalAdd') }}
                </div>
            @endif
            @if ($personals->count() == 0)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Personal Information') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('PersonalAreaAdd') }}" method="post" enctype="multipart/form-data">
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
                      <label for="exampleInputDesignation1">{{ __('Designation') }}</label>
                      <input type="text" name="designation_1" class="form-control" id="exampleInputDesignation1" placeholder="Full Stack Developer">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDesignation2">{{ __('Designation') }}</label>
                      <input type="text" name="designation_2" class="form-control" id="exampleInputDesignation2" placeholder="MERN Stack Developer">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDesignation3">{{ __('Designation') }}</label>
                      <input type="text" name="designation_3" class="form-control" id="exampleInputDesignation3" placeholder="Web Developer">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDesignation4">{{ __('Designation') }}</label>
                      <input type="text" name="designation_4" class="form-control" id="exampleInputDesignation4" placeholder="Web Designer">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDesignation5">{{ __('Designation') }}</label>
                      <input type="text" name="designation_5" class="form-control" id="exampleInputDesignation5" placeholder="UI/UX Designer">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label>{{ __('Hire Btn') }}</label>
                            <input type="text" name="hire_btn" class="form-control" placeholder="Hire Me">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>{{ __('Hire Link') }}</label>
                            <input type="text" name="hire_link" class="form-control" placeholder="Url..">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>{{ __('Hire Icon') }}</label>
                            <input type="text" name="hire_icon" class="form-control" placeholder="fa fa-rocket">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label>{{ __('Project Btn') }}</label>
                            <input type="text" name="project_btn" class="form-control" placeholder="Hire Me">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>{{ __('Project Link') }}</label>
                            <input type="text" name="project_link" class="form-control" placeholder="Url..">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>{{ __('Project Icon') }}</label>
                            <input type="text" name="project_icon" class="form-control" placeholder="fa fa-rocket">
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputFile">{{ __('Image') }}</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="image" class="custom-file-input" id="exampleInputFile" onchange="loadFile(event)">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                      <img id="output"/ width="100%">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @else
            @foreach ($personals as $personal)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Personal Information Update') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('PersonalAreaUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">{{ __('Name') }}</label>
                      <input type="hidden" name="id" value="{{ $personal->id }}">
                      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="{{ $personal->name }}" value="{{ $personal->name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputTitle">{{ __('Title') }}</label>
                      <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="{{ $personal->title }}" value="{{ $personal->title }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDesignation1">{{ __('Designation') }}</label>
                      <input type="text" name="designation_1" class="form-control" id="exampleInputDesignation1" placeholder="{{ $personal->designation_1 }}" value="{{ $personal->designation_1 }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDesignation2">{{ __('Designation') }}</label>
                      <input type="text" name="designation_2" class="form-control" id="exampleInputDesignation2" placeholder="{{ $personal->designation_2 }}" value="{{ $personal->designation_2 }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDesignation3">{{ __('Designation') }}</label>
                      <input type="text" name="designation_3" class="form-control" id="exampleInputDesignation3" placeholder="{{ $personal->designation_3 }}" value="{{ $personal->designation_3 }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDesignation4">{{ __('Designation') }}</label>
                      <input type="text" name="designation_4" class="form-control" id="exampleInputDesignation4" placeholder="{{ $personal->designation_4 }}" value="{{ $personal->designation_4 }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDesignation5">{{ __('Designation') }}</label>
                      <input type="text" name="designation_5" class="form-control" id="exampleInputDesignation5" placeholder="{{ $personal->designation_5 }}" value="{{ $personal->designation_5 }}">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label>{{ __('Hire Btn') }}</label>
                            <input type="text" name="hire_btn" class="form-control" placeholder="{{ $personal->hire_btn }}" value="{{ $personal->hire_btn }}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>{{ __('Hire Link') }}</label>
                            <input type="text" name="hire_link" class="form-control" placeholder="{{ $personal->hire_link }}" value="{{ $personal->hire_link }}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>{{ __('Hire Icon') }}</label>
                            <input type="text" name="hire_icon" class="form-control" placeholder="{{ $personal->hire_icon }}" value="{{ $personal->hire_icon }}">
                          </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-sm-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label>{{ __('Project Btn') }}</label>
                            <input type="text" name="project_btn" class="form-control" placeholder="{{ $personal->project_btn }}" value="{{ $personal->project_btn }}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>{{ __('Project Link') }}</label>
                            <input type="text" name="project_link" class="form-control" placeholder="{{ $personal->project_link }}" value="{{ $personal->project_link }}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>{{ __('Project Icon') }}</label>
                            <input type="text" name="project_icon" class="form-control" placeholder="{{ $personal->project_icon }}" value="{{ $personal->project_icon }}">
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputFile">{{ __('Image') }}</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="image" class="custom-file-input" id="exampleInputFile" onchange="loadFile(event)">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ asset('gallery/images/portfolio/banner/'.$personal->image) }}" class="img-thumbnail" alt="{{ $personal->image }}">
                        </div>
                        <div class="col-sm-6">
                      <img class="img-thumbnail" id="output"/ width="100%">
                        </div>
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
            @if (session('SocialAdd'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('SocialAdd') }}
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Social Media') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('SocialAdd') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">{{ __('Name') }}</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Facebook">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputTitle">{{ __('Url') }}</label>
                      <input type="text" name="link" class="form-control" id="exampleInputLink" placeholder="https://www.facebook.com/username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputTitle">{{ __('Icon') }}</label>
                      <input type="text" name="icon" class="form-control" id="exampleInputIcon" placeholder="fa fa-facebook">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @if (session('SocialDelete'))
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('SocialDelete') }}
                </div>
            @endif
            @if($socials->count() == 0)

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
                        <th width="15%">{{ __('Icon') }}</th>
                        <th width="50%">{{ __('Name') }}</th>
                        <th width="35%" class="text-center py-0 align-middle">{{ __('Action') }}</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($socials as $social)
                      <tr>
                        <td width="70"><i class="{{ $social->icon }}"></i></td>
                        <td width="25%"><a href="{{ $social->link }}">{{ $social->name }}</a></td>
                        <td width="20%" class="text-center py-0 align-middle">
                          <div class="btn-group btn-group-sm">
                            <a href="{{ route('SocialEdit', $social->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('SocialDelete', $social->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            @endif
            @if (session('VisionAdd'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('VisionAdd') }}
                </div>
            @endif
            @if($visions->count() == 0)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('My Vision') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('VisionAdd') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Title">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>{{ __('Text') }}</label>
                            <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="my-editor" cols="30" rows="10"></textarea>
                            @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @else
            @foreach ($visions as $vision)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('My Vision Update') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('VisionUpdate') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="hidden" name="id" value="{{ $vision->id }}">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ $vision->name }}" value="{{ $vision->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>{{ __('Text') }}</label>
                            <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="my-editor" cols="30" rows="10">{{ $vision->text }}</textarea>
                            @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @endforeach
            @endif
      </div>
    </div>
  </section>
</div>
@endsection


@section('footer_js')
<script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
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
