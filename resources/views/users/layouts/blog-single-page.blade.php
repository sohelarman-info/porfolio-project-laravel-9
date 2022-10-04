@extends('users.layouts.app')

@section('title', $blog->title)
@section('ogurl') {{ route('BlogView', $blog->slug) }} @endsection
@section('ogtitle') {{ $blog->title }} @endsection
@section('ogdescription') {{ $blog->description }} @endsection
@section('ogimage') {{ asset("gallery/images/portfolio/blog/".$blog->created_at->format('Y/').$blog->created_at->format('m/').$blog->created_at->format('d/').$blog->id.'/'.$blog->thumbnail) }}" alt="{{ $blog->thumbnail }} @endsection


@section('content')
@include('users.layouts.header')

{{-- Single Page start --}}

<section id="blog" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h1><span>{{ $blog->title }}</span><i class="fa fa-pencil"></i></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">{{ __('Post Details') }}</h5>
                    <div class="card-body">
                        <img class="img-thumbnail" src="{{ asset("gallery/images/portfolio/blog/".$blog->created_at->format('Y/').$blog->created_at->format('m/').$blog->created_at->format('d/').$blog->id.'/'.$blog->thumbnail) }}" width="100%" alt="{{ $blog->slug }}">
                        <br><br>
                      <p class="card-text">{!! $blog->post !!}</p>
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
                                    <th><b>{{ __('User') }}</b></th>
                                    <td>{{ $blog->User->name }}</td>
                                </tr>
                                <tr>
                                    <th><b>{{ __('Category') }}</b></th>
                                    <td>{{ $blog->Category->name }}</td>
                                </tr>
                                <tr>
                                    <th><b>{{ __('Created') }}</b></th>
                                    <td title="{{ $blog->created_at }}">{{ $blog->created_at->diffForHumans() }}</td>
                                </tr>
                            </table>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Single Page end --}}

@endsection

