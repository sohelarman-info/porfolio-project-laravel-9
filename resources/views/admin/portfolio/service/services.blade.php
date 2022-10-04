@extends('admin.layouts.app')
@section('title', 'Service Section')
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
        <div class="col-md-12">
            @if($servicesection->count() == 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">{{ __('Service Section') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('ServiceSectionAdd') }}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputName">{{ __('Name') }}</label>
                              <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Service Title Name">
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
            @foreach ($servicesection as $sersec)
            <div class="row">
                <div class="col-md-6">
                    @if (session('ServicesAdd'))
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('ServicesAdd') }}
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $sersec->name }}</h3>
                            <a class="btn btn-success btn-sm float-right" href="{{ route('ServiceSectionEdit', $sersec->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                          <div class="card-body">{!! $sersec->text !!}</div>
                        </div>
                    </div>
                    @if (session('ServiceAdd'))
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('ServiceAdd') }}
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">{{ __('Service Item Add') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('ServiceAdd') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">{{ __('Name') }}</label>
                                    <input type="hidden" name="service_id" value="{{ $sersec->id }}">
                                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="HTML">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputIcon">{{ __('Icon') }}</label>
                                    <input type="text" name="icon" class="form-control" id="exampleInputIcon" placeholder="fa fa-html5">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">{{ __('Text') }}</label>
                                    <textarea class="form-control" name="text" id="my-editor" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-block btn-success">{{ __('ADD SECTION ITEM') }}</button>
                            </div>
                        </form>
                    </div>
                    @if (session('ServiceDelete'))
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('ServiceDelete') }}
                        </div>
                    @endif
                    @if (session('ServiceUpdate'))
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('ServiceUpdate') }}
                        </div>
                    @endif
                    @if($services->count() == 0)
                    @else
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">{{ __('Servises Item') }}</h3>

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
                                    <th style="width: 20%">
                                        Name
                                    </th>
                                    <th style="width: 45%">
                                        Text
                                    </th>
                                    <th style="width: 5%">
                                        Icon
                                    </th>
                                    <th style="width: 25%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <a>
                                            {{ $service->name }}
                                        </a>
                                        <br>
                                        <small>
                                            Created {{ $service->created_at->format('d.m.Y') }}
                                        </small>
                                    </td>
                                    <td>
                                        {!! $service->text !!}
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                            <i class="{{ $service->icon }}"></i>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('ServiceEdit', $service->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('ServiceDelete', $service->id) }}">
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
                    </div>
                    @endif
                </div>
                {{--  Service Pricing HTML Start  --}}
                <div class="col-md-6">
                    @if (session('Add'))
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('Add') }}
                        </div>
                    @endif
                    @if($pricings->count() == 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">{{ __('Pricing Section') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('PricingSectionAdd') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="exampleInputName">{{ __('Name') }}</label>
                                      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Service Pricing">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputText">{{ __('Text') }}</label>
                                      <textarea class="form-control" name="text" id="editor" cols="30" rows="10"></textarea>
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
                    @foreach ($pricings as $price)
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $price->name }}</h3>
                            <a class="btn btn-success btn-sm float-right" href="{{ route('PricingSectionEdit', $price->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                          <div class="card-body">{!! $price->text !!}</div>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">{{ __('Pricing  Add') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('PricingAdd') }}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <label>Plan Name:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="name" placeholder="Basic">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Sign Symble:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="sign" placeholder="$">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                  </div>
                                  <input type="number" class="form-control" name="price" placeholder="500">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Duration:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="duration" placeholder="Year">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Icon:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-gift"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="icon" placeholder="fa fa-gift">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Link:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-link"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="link" placeholder="https://www.example.com/hire">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Button Name:</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-cart-plus"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="button" placeholder="Order Now">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                              <label for="exampleInputText">{{ __('Text') }}</label>
                              <textarea class="form-control" name="text" id="editor" cols="30" rows="10"></textarea>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-success">{{ __('SUBMIT') }}</button>
                          </div>
                        </form>
                    </div>
                    @if($prices->count() == 0)
                    @else
                    @if (session('Delete'))
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('Delete') }}
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">{{ __('Prices Item') }}</h3>
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
                                        Name
                                    </th>
                                    <th style="width: 40%">
                                        Text
                                    </th>
                                    <th style="width: 15%">
                                        Button
                                    </th>
                                    <th style="width: 25%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prices as $price)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td title="{{ $price->created_at->format('d.m.Y') }}">
                                        <a>
                                            <i class="{{ $price->icon }}"></i> {{ $price->name }}
                                        </a>
                                        <br>
                                        <small>
                                            {{ $price->sign }} {{ $price->price }} / {{ $price->duration }}
                                        </small>
                                    </td>
                                    <td>
                                        {!! $price->text !!}
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                            <a href="{{ $price->link }}">{{ $price->button }}</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('PriceEdit', $price->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('priceDelete', $price->id) }}">
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
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
                {{--  Service Pricing HTML End  --}}
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
