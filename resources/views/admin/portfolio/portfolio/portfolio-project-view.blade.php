@extends('admin.layouts.app')
@section('title', $projectview->name. ' View')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Portfolio', 'active')
@section('CategoryActive', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">{{ __('Project Details') }}</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="mailbox-read-info">
                      <i class="fas fa-folder"></i>  {{ $projectview->Category->name }}
                      <h6><i class="fa fa-user"></i> {{ $projectview->User->name }}
                        <span class="mailbox-read-time float-right">{{ $projectview->created_at->format('d M Y h:s A') }}</span></h6>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">{!! $projectview->text !!}</div>
                    <!-- /.mailbox-read-message -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer bg-white">
                    <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                      @foreach ($projectview->MultipleImages as $images)
                      <img width="10%" class="img-thumbnail" src="{{ asset('gallery/images/portfolio/project/'.$projectview->created_at->format('Y/m/d/').$projectview->id.'/'.'images/'.$images->images) }}" alt="{{ $images->images }}">
                      @endforeach
                    </ul>
                  </div>
                  <!-- /.card-footer -->
                  <div class="card-footer">
                    <div class="float-right">
                      <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                      <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                    </div>
                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
          <!-- /.col -->
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Folders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  @foreach ($projectcategory as $category)
                  <li class="nav-item {{ ($projectview->Category->id == $category->id) ? 'active' : '' }}">
                    <a href="{{ route('InCategory', $category->slug) }}" class="nav-link">
                      <i class="fas fa-folder"></i>  {{ $category->name }}
                      <span class="badge bg-primary float-right">{{ $category->Project->count() }}</span>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
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
