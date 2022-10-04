@extends('users.layouts.app')

@section('title') {{ $project->name }} @endsection
@section('ogurl') {{ route('PortfolioViewPage', $project->slug) }} @endsection
@section('ogtitle') {{ $project->name }} @endsection
@section('ogdescription') {{ $project->summary }} @endsection
@section('ogimage') {{ asset('gallery/images/portfolio/project').'/'.$project->created_at->format('Y/m/d').'/'.$project->id.'/thumbnail/'.$project->thumbnail }} @endsection

@section('content')
@include('users.layouts.header')
{{-- Single Page start --}}

<section id="blog" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h1><span>{{ $project->name }}</span><i class="fa fa-pencil"></i></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">{{ __('Project Details') }}</h5>
                    <div class="card-body">
                      <p class="card-text">{!! $project->text !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">{{ __('Basic Information') }}</h5>
                    <p class="card-text">
                        <div class="table">
                            <table>
                                <tr>
                                    <th><b>{{ __('Company') }}</b></th>
                                    <td>{{ $project->company }}</td>
                                </tr>
                                <tr>
                                    <th><b>{{ __('Client') }}</b></th>
                                    <td>{{ $project->client }}</td>
                                </tr>
                                <tr>
                                    <th><b>{{ __('Project Url') }}</b></th>
                                    <td><a href="{{ $project->url }}">Demo</a></td>
                                </tr>
                                <tr>
                                    <th><b>{{ __('Category') }}</b></th>
                                    <td>{{ $project->Category->name }}</td>
                                </tr>
                                <tr>
                                    <th><b>{{ __('Created') }}</b></th>
                                    <td title="{{ $project->created_at }}">{{ $project->created_at->diffForHumans() }}</td>
                                </tr>
                            </table>
                        </div>
                    </p>

                </div>
                {{-- <div class="card">
                    <h5 class="card-header">{{ __('Thumbnail') }}</h5>
                    <div class="card-body">
                        <img src="{{ asset('gallery/images/portfolio/project').'/'.$project->created_at->format('Y/m/d').'/'.$project->id.'/thumbnail/'.$project->thumbnail }}" alt="{{ $project->name }}"/>
                    </div>
                </div> --}}
                <div class="card">
                    <h5 class="card-header">{{ __('Preview Images') }}</h5>
                    <div class="card-body">
                        <div class="preview_images">
                            @foreach ($project->MultipleImages as $images)
                            <img class="table-avatar" src="{{ asset('gallery/images/portfolio/project').'/'.$project->created_at->format('Y/m/d').'/'.$project->id.'/images/'.$images->images }}" alt="{{ $images->images }}">
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Single Page end --}}

@endsection

