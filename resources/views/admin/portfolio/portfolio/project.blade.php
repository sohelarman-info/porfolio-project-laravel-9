@extends('admin.layouts.app')
@section('title', 'Portfolio Project View')
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
                @if (session('ProjectDelete'))
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{ session('ProjectDelete') }}
                    </div>
                @endif
                <div class="card-primary card-outline">
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
                              @foreach ($projects as $key => $project)
                              <tr>
                                <td>
                                    {{ $key + $projects->firstItem() }}
                                </td>
                                <td>
                                    <img class="img-thumbnail" src="{{ asset('gallery/images/portfolio/project').'/'.$project->created_at->format('Y/m/d').'/'.$project->id.'/thumbnail/'.$project->thumbnail }}" alt="{{ $project->name }}">
                                </td>
                                <td>
                                    <a href="{{ route('PortfolioProjectView', $project->slug) }}">
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
                        {!! $projects->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
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
                  <li class="nav-item">
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
