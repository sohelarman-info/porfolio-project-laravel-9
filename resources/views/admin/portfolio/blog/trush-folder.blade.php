@extends('admin.layouts.app')
@section('title', 'Trush Blog')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('Blog', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
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
            @if($trushed->count() == 0)
            <p class="text-center m-5">Trush Folder Empty</p>
            @else
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Trush File List') }}</h3>
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
                              <th style="width: 10%">
                                  Thumbnail
                              </th>
                              <th style="width: 55%">
                                  Project Name
                              </th>
                              <th style="width: 30%; float: right">
                                Action
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($trushed as $key => $blog)
                          <tr>
                            <td>
                                {{ $key + $trushed->firstItem() }}
                            </td>
                            <td>
                                <img class="img-thumbnail" src="{{ asset("gallery/images/portfolio/blog/".$blog->created_at->format('Y/').$blog->created_at->format('m/').$blog->created_at->format('d/').$blog->id.'/'.$blog->thumbnail) }}" alt="{{ $blog->title }}">
                            </td>
                            <td>
                                <a>
                                    {{ $blog->title }}
                                </a>
                                <br>
                                <small>
                                    Created {{ $blog->created_at->format('d.m.Y') }}
                                </small>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('BlogRestore', $blog->id) }}">
                                    <i class="fas fa-trash-restore"></i>
                                    </i>
                                    Restore
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ route('BlogDestroy', $blog->id) }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Permanent Delete
                                </a>
                            </td>
                        </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {!! $trushed->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>

            </div>
            @endif
        </div>
        <div class="col-md-4">
            @if($blogcategories->count() == 0)
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
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Post') }}</th>
                        <th class="text-right py-0 align-middle">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($blogcategories as $index => $category)
                        <tr>
                        <td>{{ $index + $blogcategories->firstItem() }}</td>
                        <td><a href="{{ route('InCategory', $category->slug) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->Blog->count() }}</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                            <a href="{{ route('BlogCategoryEdit', $category->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('BlogCategoryDelete', $category->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {!! $blogcategories->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
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
