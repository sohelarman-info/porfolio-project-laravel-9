@extends('admin.layouts.app')
@section('title', 'Testimonials Section')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Testimonials', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content-header">
    <div class="container-fluid">
        @if (session('Add'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('Add') }}
            </div>
        @endif
        @if (session('Delete'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('Delete') }}
            </div>
        @endif
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('Testimonial') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="{{ route('TestimonialAdd') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Add Testimonial
            </a>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  {{--  Content area start  --}}
  <section class="content">
    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row">
          @foreach ($testimonials as $testimonial)
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    @php
                        for($x=1; $x <= $testimonial->star; $x++)
                        echo '<i class="fas fa-star"></i>'
                    @endphp
                  </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead"><b>{{ $testimonial->name }}</b></h2>
                    <p class="text-muted text-sm"><b>About: </b> {{ $testimonial->title }} </p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small">{!! Str::limit($testimonial->text, 100, ' ...') !!}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    <img src="{{ asset('gallery/images/portfolio/testimonials/images/'.$testimonial->image) }}" alt="{{ $testimonial->image }}" class="img-circle img-fluid">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="{{ route('TestimonialDelete', $testimonial->id) }}" class="btn btn-sm bg-danger">
                    <i class="fas fa-trash"></i> Delete
                  </a>
                  <a href="{{ route('TestimonialEdit', $testimonial->id) }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
            {!! $testimonials->withQueryString()->links('pagination::bootstrap-5') !!}
        </nav>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>
  {{--  Content area end  --}}
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
    CKEDITOR.replace('editor', options);
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
