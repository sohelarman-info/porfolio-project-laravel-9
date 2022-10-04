@extends('admin.layouts.app')
@section('title', $blog->title. ' View')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Blog', 'active')
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
                    <h3 class="card-title">{{ $blog->title }}</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="mailbox-read-info">
                      <i class="fas fa-folder"></i>  {{ $blog->Category->name }}
                      <h6><i class="fa fa-user"></i> {{ $blog->User->name }}
                        <span class="mailbox-read-time float-right">{{ $blog->created_at->format('d M Y h:s A') }}</span></h6>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">{!! $blog->post !!}</div>
                    <!-- /.mailbox-read-message -->
                  </div>
                  <!-- /.card-body -->
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
                  @foreach ($categories as $category)
                  <li class="nav-item {{ ($category->id == $blog->Category->id) ? 'active' : '' }}">
                    <a href="{{ route('InCategory', $category->slug) }}" class="nav-link">
                      <i class="fas fa-folder"></i>  {{ $category->name }}
                      <span class="badge bg-primary float-right">{{ $category->Blog->count() }}</span>
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
