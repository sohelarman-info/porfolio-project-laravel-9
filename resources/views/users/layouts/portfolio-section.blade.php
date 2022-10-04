
		<!-- Start portfolio -->
		@if($portfolios->count() == 0)
        @else
        <section id="portfolio" class="section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h1><span>My</span> Portfolio<i class="fa fa-briefcase"></i></h1>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<!-- portfolio Nav -->
						<div class="portfolio-nav">
							<ul>
								<li class="active" data-filter="*"><span>{{ $categories->count() }}</span><i class="fa fa-tasks"></i>All Works</li>
								@foreach ($categories as $category)
                                <li data-filter=".{{ $category->slug }}"><span>{{ $category->Project->count() }}</span><i class="fa fa-pencil"></i>{{ $category->name }}</li>
                                @endforeach
							</ul>
						</div>
						<!--/ End portfolio Nav -->
					</div>
				</div>

				<div class="portfolio-inner">
					<div class="row stylex">
						<div class="isotop-active">
							<!-- Single portfolio -->
							@foreach ($projects as $project)
                            <div class="mix {{ $project->Category->slug }} html5 col-md-4 col-sm-6 col-xs-12 col-fix ">
								<div class="portfolio-single">
									<div class="portfolio-head">
										<img src="{{ asset('gallery/images/portfolio/project').'/'.$project->created_at->format('Y/m/d').'/'.$project->id.'/thumbnail/'.$project->thumbnail }}" alt="{{ $project->name }}"/>
									</div>
									<div class="portfolio-hover">
										<h4><span>{{ $project->Category->name }}</span><a href="#">{{ $project->name }}</a></h4>
										<p>{{ $project->summary }}</p>
										<div class="button">
											<a data-fancybox="gallery" href="{{ asset('gallery/images/portfolio/project').'/'.$project->created_at->format('Y/m/d').'/'.$project->id.'/thumbnail/'.$project->thumbnail }}"><i class="fa fa-search"></i></a>
											<a href="{{ route('PortfolioViewPage', $project->slug) }}" class="primary"><i class="fa fa-link"></i></a>
										</div>
									</div>
								</div>
							</div>
                            @endforeach
							<!--/ End portfolio -->
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Button -->
					<div class="button">
						<a href="{{ route('PortfolioList') }}" class="btn">More Portfolio<i class="fa fa-angle-double-right"></i></a>
					</div>
					<!-- End Button -->
				</div>
			</div>
		</section>
        @endif
		<!--/ End portfolio -->

