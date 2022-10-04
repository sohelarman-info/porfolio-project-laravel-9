@extends('admin.layouts.app')
@section('title', 'Contact Section')
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
        <div class="col-md-12">
            @if($contactsection->count() == 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">{{ __('Contact Section') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('ContactSectionAdd') }}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputName">{{ __('Name') }}</label>
                              <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Contact Title Name">
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
            @foreach ($contactsection as $contact)
            <div class="row">
                <div class="col-md-6">
                    @if (session('Add'))
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('Add') }}
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $contact->name }}</h3>
                            <a class="btn btn-success btn-sm float-right" href="{{ route('ContactSectionEdit', $contact->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                          <div class="card-body">{!! $contact->text !!}</div>
                        </div>
                    </div>
                    @if (session('ContactAdd'))
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('ContactAdd') }}
                        </div>
                    @endif
                    @if($contacts->count() == 0)
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">{{ __('Contact Add') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('ContactAdd') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="exampleInputNumber1">{{ __('Number 01') }}</label>
                                        <input type="text" name="number1" class="form-control" id="exampleInputNumber1" placeholder="01782-780200">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputNumber2">{{ __('Number 02') }}</label>
                                        <input type="text" name="number2" class="form-control" id="exampleInputNumber2" placeholder="01782-780200">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">{{ __('Email 01') }}</label>
                                        <input type="email" name="email1" class="form-control" id="exampleInputEmail1" placeholder="sohelarman.info@gmail.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail2">{{ __('Email 02') }}</label>
                                        <input type="email" name="email2" class="form-control" id="exampleInputEmail2" placeholder="sohelarman.me@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">{{ __('Address') }}</label>
                                    <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-block btn-success">{{ __('ADD CONTACT') }}</button>
                            </div>
                        </form>
                    </div>
                    @else
                    @foreach ($contacts as $call)
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">{{ __('Contact Update') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('ContactUpdate') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="exampleInputNumber1">{{ __('Number 01') }}</label>
                                        <input type="hidden" name="id" value="{{ $call->id }}">
                                        <input type="text" name="number1" class="form-control" id="exampleInputNumber1" placeholder="{{ $call->number1 }}" value="{{ $call->number1 }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputNumber2">{{ __('Number 02') }}</label>
                                        <input type="text" name="number2" class="form-control" id="exampleInputNumber2" placeholder="{{ $call->number2 }}" value="{{ $call->number2 }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">{{ __('Email 01') }}</label>
                                        <input type="email" name="email1" class="form-control" id="exampleInputEmail1" placeholder="{{ $call->email1 }}" value="{{ $call->email1 }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail2">{{ __('Email 02') }}</label>
                                        <input type="email" name="email2" class="form-control" id="exampleInputEmail2" placeholder="{{ $call->email2 }}" value="{{ $call->email2 }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">{{ __('Address') }}</label>
                                    <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10">{!! $call->text !!}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-block btn-success">{{ __('UPDATE') }}</button>
                            </div>
                        </form>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="col-md-6">
                    @if (session('PaymentAdd'))
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('PaymentAdd') }}
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">{{ __('Payment Method') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('PaymentMethodAdd') }}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputName">{{ __('Name') }}</label>
                              <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputAccount">{{ __('Account Number') }}</label>
                              <input type="text" name="account" class="form-control" id="exampleInputAccount" placeholder="Account Number">
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
                            <div class="form-group">
                                <img id="output"/ width="100%">
                            </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-success">Submit</button>
                          </div>
                        </form>
                    </div>
                    @if (session('PaymentDelete'))
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('PaymentDelete') }}
                        </div>
                    @endif
                    @if($payments->count() == 0)
                        <div class="text-center">
                            <p>Payment Method Empty</p>
                        </div>
                    @else
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Projects List</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                              <i class="fas fa-times"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body p-0">
                          <table class="table table-striped projects">
                              <thead>
                                  <tr>
                                      <th style="width: 5%">
                                          SL
                                      </th>
                                      <th style="width: 15%">
                                          Image
                                      </th>
                                      <th style="width: 40%">
                                          Account Name
                                      </th>
                                      <th style="width: 40%; float: right">
                                        Action
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($payments as $payment)
                                <tr>
                                    <td>
                                       {{ $loop->iteration}}
                                    </td>
                                    <td>
                                        <img class="img-thumbnail" src="{{ asset('gallery/images/portfolio/payment/'.$payment->image) }}" alt="{{ $payment->image }}">
                                    </td>
                                    <td>
                                        <a>
                                            {{ $payment->name }}
                                        </a>
                                        <br>
                                        <small>
                                            {{ $payment->account }}
                                        </small>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('PaymentMethodEdit', $payment->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('PaymentMethodDelete', $payment->id) }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">

                        </div>
                    </div>
                    @endif
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
