@extends('admin.layouts.app')
@section('title', 'Blog Section')
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
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    @if (session('Add'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                            {{ session('Add') }}
                        </div>
                    @endif
                    @if($blogsections->count() == 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Blog Section') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('BlogSectionAdd') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">{{ __('Heading Title') }}</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Title Name">
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
                    <div class="row">
                        <div class="col-md-8">
                            @foreach ($blogsections as $blogsection)
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $blogsection->name }}</h3>
                                    <a class="btn btn-success btn-sm float-right" href="{{ route('BlogSectionEdit', $blogsection->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                  <div class="card-body">{!! $blogsection->text !!}</div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-info btn-sm float-right" href="{{ route('blog.create') }}">
                                        <i class="fas fa-plus">
                                        </i>
                                        Create Blog
                                    </a>
                                    <div class="float-left">
                                        <a class="float-right" href="{{ route('TrushFolder') }}"> Go to Trush</a>
                                    </div>
                                </div>
                            </div>
                            @if (session('BlogAdd'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                    {{ session('BlogAdd') }}
                                </div>
                            @endif
                            @if (session('BlogDelete'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                    {{ session('BlogDelete') }}
                                </div>
                            @endif
                            @if($blogs->count() == 0)
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
                                                  @foreach ($blogs as $key => $blog)
                                                  <tr>
                                                    <td>
                                                        {{ $key + $blogs->firstItem() }}
                                                    </td>
                                                    <td>
                                                        <img class="img-thumbnail" src="{{ asset("gallery/images/portfolio/blog/".$blog->created_at->format('Y/').$blog->created_at->format('m/').$blog->created_at->format('d/').$blog->id.'/'.$blog->thumbnail) }}" alt="{{ $blog->title }}">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('blog.show', $blog->id) }}">
                                                            {{ $blog->title }}
                                                        </a>
                                                        <br>
                                                        <small>
                                                            Created {{ $blog->created_at->format('d.m.Y') }} {{ $blog->Category->User->name }}
                                                        </small>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="{{ route('blog.show', $blog->id) }}">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="{{ route('blog.edit', $blog->id) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="{{ route('SoftDelete', $blog->id) }}">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Soft Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                  @endforeach
                                              </tbody>
                                          </table>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer clearfix">
                                            {!! $blogs->withQueryString()->links('pagination::bootstrap-5') !!}
                                        </div>

                                    </div>
                                    @endif
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                <h3 class="card-title">{{ __('Blog Category') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('BlogCategoryAdd') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">{{ __('Name') }}</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Web">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-block btn-success">{{ __('ADD CATEGORY') }}</button>
                                    </div>
                                </form>
                            </div>
                            @if (session('CategoryAdd'))
                                <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                {{ session('CategoryAdd') }}
                                </div>
                            @endif
                            @if (session('CategoryDelete'))
                                <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                {{ session('CategoryDelete') }}
                                </div>
                            @endif
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
                                        <td><a href="{{ route('BlogInCategory', $category->slug) }}">{{ $category->name }}</a></td>
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
