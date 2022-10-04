@extends('admin.layouts.app')
@section('title', 'Payment Method Update')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('ContactSection', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10 mx-auto">

            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Payment Method Update') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('PaymentMethodUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">{{ __('Name') }}</label>
                      <input type="hidden" name="id" value="{{ $payment->id }}">
                      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="{{ $payment->name }}" value="{{ $payment->name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAccount">{{ __('Name') }}</label>
                      <input type="hidden" name="id" value="{{ $payment->id }}">
                      <input type="text" name="account" class="form-control" id="exampleInputAccount" placeholder="{{ $payment->account }}" value="{{ $payment->account }}">
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
                            <img width="100%" src="{{ asset('gallery/images/portfolio/payment/'.$payment->image) }}" class="img-thumbnail" alt="{{ $payment->image }}">
                        </div>
                        <div class="col-sm-6">
                      <img class="img-thumbnail" id="output"/ width="100%">
                        </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">{{ __('Update') }}</button>
                  </div>
                </form>
            </div>
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
