@extends('admin.layouts.app')
@section('title', 'Skill Section')
@section('PortManOpen', 'menu-open')
@section('PortManActive', 'active')
@section('SkillSection', 'active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
            @if (session('SkillAdd'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('SkillAdd') }}
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Skills Add') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('SkillAdd') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                          <!-- text input -->
                          <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Web">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-group">
                            <label>{{ __('Skills') }}</label>
                            <input type="text" name="skill" class="form-control @error('skill') is-invalid @enderror" placeholder="HTML">
                            @error('skill')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>{{ __('Percent') }}</label>
                            <input type="text" name="percent" class="form-control @error('percent') is-invalid @enderror" placeholder="90%">
                            @error('percent')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @if (session('WhyMe'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('WhyMe') }}
                </div>
            @endif
            @if ($whyme->count() == 0)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Why ME Add') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('WhyMe') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Why Me?">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>{{ __('Text') }}</label>
                            <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="my-editor" cols="30" rows="10"></textarea>
                            @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @else
            @foreach ($whyme as $why)
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Why ME Update') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('WhyMeUpdate') }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="hidden" name="id" value="{{ $why->id }}">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ $why->name }}" value="{{ $why->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>{{ __('Text') }}</label>
                            <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="my-editor" cols="30" rows="10">{!! $why->text !!}</textarea>
                            @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                  </div>
                </form>
            </div>
            @endforeach
            @endif
        </div>
        <div class="col-md-8">
            @if (session('SkillUpdate'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('SkillUpdate') }}
                </div>
            @endif
            @if (session('SkillDelete'))
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('SkillDelete') }}
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ __('Skills Update') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th style="width: 5%; text-align:center">{{ __('SL') }}</th>
                                        <th style="width: 20%; text-align:center">{{ __('Name') }}</th>
                                        <th style="width: 25%; text-align:center">{{ __('Skiils') }}</th>
                                        <th style="width: 10%; text-align:center">{{ __('Percent') }}</th>
                                        <th style="width: 30%; text-align:center">{{ __('Progress') }}</th>
                                        <th style="width: 10%; text-align:center">{{ __('Action') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($skills as $skill)
                                        <form action="{{ route('SkillUpdate') }}" method="post">
                                                @csrf
                                            <tr>
                                                <td>{{$loop->iteration}}.</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" value="{{ $skill->id }}">
                                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ $skill->name }}" value="{{ $skill->name }}">
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="skill" class="form-control @error('skill') is-invalid @enderror" placeholder="{{ $skill->skill }}" value="{{ $skill->skill }}">
                                                        @error('skill')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" name="percent" class="form-control @error('percent') is-invalid @enderror" placeholder="{{ $skill->percent }}" value="{{ $skill->percent }}">
                                                        @error('percent')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress mt-3">
                                                        <div class="progress-bar" role="progressbar" style="width: {{ $skill->percent }}%;" aria-valuenow="{{ $skill->percent }}" aria-valuemin="0" aria-valuemax="100">{{ $skill->percent }}%</div>
                                                    </div>
                                                </td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                                    <a href="{{ route('SkillDelete', $skill->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                        </form>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
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
