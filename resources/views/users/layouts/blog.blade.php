<!-- Start Blog -->
@foreach ($blogsections as $blogsection)
<section id="blog" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h1><span>{{ $blogsection->name }}</span><i class="fa fa-pencil"></i></h1>
                    {!! $blogsection->text !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="blog-carousel">
                    <!-- Single Blog -->
                    @foreach ($blogs as $blog)
                    <div class="single-blog">
                        <div class="blog-head">
                            <img src="{{ asset("gallery/images/portfolio/blog/".$blog->created_at->format('Y/').$blog->created_at->format('m/').$blog->created_at->format('d/').$blog->id.'/'.$blog->thumbnail) }}" alt="{{ $blog->thumbnail }}" class="img-responsive">
                            <div class="blog-link">
                                <a href="{{ route('BlogView', $blog->slug) }}"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="blog-info">
                            <div class="date">
                                <div class="day"><span>{{ $blog->created_at->format('d') }}</span>{{ $blog->created_at->format('M') }}</div>
                                <div class="year">{{ $blog->created_at->format('Y') }}</div>
                            </div>
                            <h2><a href="{{ route('BlogView', $blog->slug) }}">{{ $blog->title }}</a></h2>
                            <div class="meta">
                                <span><i class="fa fa-user"></i>By {{ $blog->User->name }}</span>
                                <span><i class="fa fa-comments"></i>45 comments</span>
                                <span><i class="fa fa-eye"></i>5k views</span>
                            </div>
                            <p>{!! Str::limit($blog->description, 200, ' ...') !!}</p>
                            <a href="{{ route('BlogView', $blog->slug) }}" class="btn">Read more<i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                    <!--/ End Single Blog -->
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<!--/ End Blog -->
