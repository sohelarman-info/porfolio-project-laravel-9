@extends('users.page.content')
@section('title', 'Portfolio List')
@section('content')
<section id="blog" class="section">
    <div class="container">
        <div class="row">
            @foreach ($projects as $project)
            <!-- Single Blog -->
            <div class="col-md-4">
                <div class="single-blog">
                    <div class="blog-head">
                        <img src="{{ asset('gallery/images/portfolio/project').'/'.$project->created_at->format('Y/m/d').'/'.$project->id.'/thumbnail/'.$project->thumbnail }}" alt="{{ $project->name }}" class="img-responsive">
                        <div class="blog-link">
                            <a href="{{ route('PortfolioViewPage', $project->slug) }}"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="blog-info">
                        <div class="date">
                            <div class="day"><span>{{ $project->created_at->format('d') }}</span>{{ $project->created_at->format('M') }}</div>
                            <div class="year">{{ $project->created_at->format('Y') }}</div>
                        </div>
                        <h2><a href="{{ route('PortfolioViewPage', $project->slug) }}">{{ $project->name }}</a></h2>
                        <div class="meta">
                            <span><i class="fa fa-folder"></i>{{ $project->Category->name }}</span>
                            <span><i class="fa fa-user"></i>{{ $project->client }}</span>
                            <span><i class="fa fa-history"></i>{{ $project->created_at->diffForHumans() }}</span>
                        </div>
                        <p>{{ Str::limit($project->summary, 180) }}</p>
                        <a href="{{ route('PortfolioViewPage', $project->slug) }}" class="btn">Read more<i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            <!--/ End Single Blog -->
        </div>
        <div class="text-center">
            {!! $projects->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</section>

@endsection
