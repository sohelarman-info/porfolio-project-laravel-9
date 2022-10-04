@extends('admin.layouts.app')
@section('title', $pricing->name.' Edit')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('ServiceSection', 'active')

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
                  <h3 class="card-title">{{ __('Pricing Update') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('PricingUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label>Plan Name:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                          </div>
                          <input type="hidden" name="id" value="{{ $pricing->id }}">
                          <input type="text" class="form-control" name="name" placeholder="{{ $pricing->name }}" value="{{ $pricing->name }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Sign Symble:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                          </div>
                          <input type="text" class="form-control" name="sign" placeholder="{{ $pricing->sign }}" value="{{ $pricing->sign }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                          </div>
                          <input type="number" class="form-control" name="price" placeholder="{{ $pricing->price }}" value="{{ $pricing->price }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Duration:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="text" class="form-control" name="duration" placeholder="{{ $pricing->duration }}" value="{{ $pricing->duration }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Icon:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-gift"></i></span>
                          </div>
                          <input type="text" class="form-control" name="icon" placeholder="{{ $pricing->icon }}" value="{{ $pricing->icon }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Link:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                          </div>
                          <input type="text" class="form-control" name="link" placeholder="{{ $pricing->link }}" value="{{ $pricing->link }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Button Name:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-cart-plus"></i></span>
                          </div>
                          <input type="text" class="form-control" name="button" placeholder="{{ $pricing->button }}" value="{{ $pricing->button }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText">{{ __('Text') }}</label>
                      <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10">{!! $pricing->text !!}</textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">{{ __('SUBMIT') }}</button>
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
