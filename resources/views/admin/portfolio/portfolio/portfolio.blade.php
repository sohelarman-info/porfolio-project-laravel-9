@extends('admin.layouts.app')
@section('title', 'Portfolio Section')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Portfolio', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    @if($portfoliosection->count() == 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Portfolio Section') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('PortfolioSectionAdd') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">{{ __('Name') }}</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Portfolio Title Name">
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
                    @foreach ($portfoliosection as $portsec)
                    <div class="row">
                        <div class="col-md-8">
                            @if (session('PortfolioSectionAdd'))
                                <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                {{ session('PortfolioSectionAdd') }}
                                </div>
                            @endif
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ $portsec->name }}</h3>
                                        <div class="btn-group btn-group-sm float-right">
                                            <a href="{{ route('PortfolioSectionEdit', $portsec->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('PortfolioAdd') }}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">{!! $portsec ->text!!}</div>
                                    </div>
                                </div>
                                @if (session('ProjectDelete'))
                                    <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                    {{ session('ProjectDelete') }}
                                    </div>
                                @endif
                                @if($portfolioproject->count() == 0)
                                @else
                                <div class="card">
                                    <div class="card-header">
                                      <h3 class="card-title">{{ __('Projects List') }}</h3>

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
                                                  <th style="width: 1%">
                                                      SL
                                                  </th>
                                                  <th style="width: 9%">
                                                      Thumbnail
                                                  </th>
                                                  <th style="width: 30%">
                                                      Project Name
                                                  </th>
                                                  <th style="width: 30%">
                                                    Multiple Image
                                                  </th>
                                                  <th style="width: 30%; float: right">
                                                    Action
                                                  </th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              @foreach ($portfolioproject as $key => $project)
                                              <tr>
                                                <td>
                                                    {{ $key + $portfolioproject->firstItem() }}
                                                </td>
                                                <td>
                                                    <img class="img-thumbnail" src="{{ asset('gallery/images/portfolio/project').'/'.$project->created_at->format('Y/m/d').'/'.$project->id.'/thumbnail/'.$project->thumbnail }}" alt="{{ $project->name }}">
                                                </td>
                                                <td>
                                                    <a>
                                                        {{ $project->name }}
                                                    </a>
                                                    <br>
                                                    <small>
                                                        Created {{ $project->created_at->format('d.m.Y') }}
                                                    </small>
                                                </td>
                                                <td>
                                                    <ul class="list-inline">
                                                        @foreach ($project->MultipleImages as $images)
                                                        <li class="list-inline-item">
                                                            <img class="table-avatar" src="{{ asset('gallery/images/portfolio/project').'/'.$project->created_at->format('Y/m/d').'/'.$project->id.'/images/'.$images->images }}" alt="{{ $images->images }}">
                                                        </li>
                                                        @endforeach

                                                    </ul>
                                                </td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('PortfolioProjectView', $project->slug) }}">
                                                        <i class="fas fa-folder">
                                                        </i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info btn-sm" href="{{ route('PortfolioProjectEdit', $project->slug) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="{{ route('PortfolioProjectDelete', $project->id) }}">
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
                                        {!! $portfolioproject->withQueryString()->links('pagination::bootstrap-5') !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                <h3 class="card-title">{{ __('Portfolio Category') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('PortCatAdd') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">{{ __('Name') }}</label>
                                            <input type="hidden" name="portsecid" value="{{ $portsec->id }}">
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="HTML">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputIcon">{{ __('Icon') }}</label>
                                            <input type="text" name="icon" class="form-control" id="exampleInputIcon" placeholder="fa fa-html5">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-block btn-success">{{ __('ADD CATEGORY') }}</button>
                                    </div>
                                </form>
                            </div>
                            @if (session('PortCatAdd'))
                                <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                {{ session('PortCatAdd') }}
                                </div>
                            @endif
                            @if (session('PortCatDelete'))
                                <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                {{ session('PortCatDelete') }}
                                </div>
                            @endif
                            @if($portfoliocategory->count() == 0)
                            @else
                            <div class="card">
                                <div class="card-header">
                                  <h3 class="card-title">{{ __('Category List') }}</h3>
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
                                        <th>{{ __('SL') }}</th>
                                        <th>{{ __('Icon') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Post') }}</th>
                                        <th class="text-right py-0 align-middle">{{ __('Action') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                      @foreach ($portfoliocategory as $portcat)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><i class="{{ $portcat->icon }}"></i></td>
                                        <td><a href="{{ route('InCategory', $portcat->slug) }}">{{ $portcat->name }}</a></td>
                                        <td>{{ $portcat->Project->count() }}</td>
                                        <td class="text-right py-0 align-middle">
                                          <div class="btn-group btn-group-sm">
                                            <a href="{{ route('PortCatEdit', $portcat->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('PortCatDelete', $portcat->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
                    @endforeach
                    @endif
                </div>
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
