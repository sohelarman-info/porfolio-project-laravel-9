@extends('admin.layouts.app')
@section('title', 'Education Section')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Education', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            @if (session('EducationAdd'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('EducationAdd') }}
                </div>
            @endif
            @if($educations->count() == 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">{{ __('Education Section') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('EducationSectionAdd') }}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputName">{{ __('Name') }}</label>
                              <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Education Title">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputText">{{ __('Text') }}</label>
                              <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10"></textarea>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-success">{{ __('ADD SECTION') }}</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            @else
            @foreach ($educations as $education)
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $education->name }}</h3>
                            <a class="btn btn-success btn-sm float-right" href="{{ route('EducationSectionEdit', $education->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                          <div class="card-body">{!! $education->text !!}</div>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">{{ __('Education Section') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('StudyAdd') }}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <label>Title:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-book-reader"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="title" placeholder="SSC">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Institute Name:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="name" placeholder="Dhaka University">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Joining Date:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                  </div>
                                  <input type="text" name="start" class="form-control" placeholder="Jan 2005">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Passing Date:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                  </div>
                                  <input type="text" name="end" class="form-control" placeholder="Jan 2010">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                              <label for="exampleInputText">{{ __('Text') }}</label>
                              <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10"></textarea>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-success">{{ __('SUBMIT') }}</button>
                          </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    @if (session('Delete'))
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('Delete') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                          <!-- The time line -->
                          @foreach ($studies as $study)
                          <div class="timeline">
                            <!-- timeline time label -->
                            <div class="time-label">
                              <span class="bg-red">{{ $study->end }}</span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-envelope bg-blue"></i>
                              <div class="timeline-item">
                                <span class="time" title="{{ $study->created_at }}"><i class="fas fa-clock"></i> {{ $study->created_at->diffForHumans() }}</span>
                                <h3 class="timeline-header"><a href="#">{{ $study->title }}</a> {{ $study->name }}</h3>

                                <div class="timeline-body">
                                   {!! $study->text !!}
                                </div>
                                <div class="timeline-footer">
                                  <a href="{{ route('StudyEdit', $study->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                  <a href="{{ route('StudyDelete', $study->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <div>
                              <i class="fas fa-clock bg-gray"></i>
                            </div>
                          </div>
                          @endforeach
                        </div>
                        <!-- /.col -->
                      </div>
                </div>
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
