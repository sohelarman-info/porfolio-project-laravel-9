
		<!-- Start About Me -->
		<section id="about-me" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 fix">
						<!-- About Tab -->
						<div class="tabs-main">
							<!-- Tab Menu -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><span class="tooltips">About Me</span><a href="#welcome" role="tab" data-toggle="tab"><i class="fa fa-user"></i></a></li>
								<li role="presentation"><span class="tooltips">My Skill</span><a href="#skill" role="tab"  data-toggle="tab"><i class="fa fa-rocket"></i></a></li>
								<li role="presentation"><span class="tooltips">why Me</span><a href="#why" role="tab"  data-toggle="tab"><i class="fa fa-question"></i></a></li>
								<li role="presentation"><span class="tooltips">My Vision</span><a href="#vision" role="tab"  data-toggle="tab"><i class="fa fa-graduation-cap"></i></a></li>
							</ul>
							<!--/ End Tab Menu -->
                            <div class="tab-content">
								<!-- Single Tab -->
								<div role="tabpanel" class="tab-pane fade in active" id="welcome">
							        @foreach ($abouts as $about)
									<div class="about-text">
										<h2 class="tab-title">{{ $about->name }}</h2>
										<div class="row">
											<div class="col-md-4 col-sm-4 col-xs-12">
												<!-- About Image -->
												<div class="single-image">
												    @section('ogimage'){{ asset('gallery/images/portfolio/about/images/'.$about->image) }}@endsection
													<img src="{{ asset('gallery/images/portfolio/about/images/'.$about->image) }}" alt="">
												</div>
											</div>
											<!-- End About Image -->
											<div class="col-md-8 col-sm-12 col-xs-12">
												<div class="content">
													{!! $about->text !!}
												</div>
												<div class="social">
													<ul>
														@foreach ($socials as $social)
                                                        <li><a href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a><li>
                                                        @endforeach

                                                            @guest
	                                                            @if (Route::has('login'))
	                                                            <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i></a><li>
	                                                            @endif

	                                                            @if (Route::has('register'))
	                                                            <li><a href="{{ route('register') }}"><i class="fa fa-user"></i></a><li>
	                                                            @endif
	                                                        @else
	                                                        @role('Admin')
	                                                        <li><a href="{{ route('admin') }}"><i class="fa fa-th-large"></i></a><li>
	                                                            @endrole
	                                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
	                                                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i></a><li>
	                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	                                                                    @csrf
	                                                                </form>
	                                                            </li>
	                                                        @endguest
													</ul>
												</div>
											</div>
										</div>
									</div>
                                    @endforeach
								</div>
								<!--/ End Single Tab -->
								<!-- Single Tab -->
								<div role="tabpanel" class="tab-pane fade" id="skill">
									<h2 class="tab-title">My Skill</h2>
									<div class="row">
										@foreach ($skills as $skill)
                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<!-- Single Skill -->
											<div class="single-skill">
												<div class="skill-info">
													<h4>{{ $skill->skill }}</h4>
												</div>
												<div class="progress">
												  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->percent }}%;"><span>{{ $skill->percent }}%</span></div>
												</div>
											</div>
											<!--/ End Single Skill -->
										</div>
                                        @endforeach
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Single Tab -->
								@foreach ($whyme as $why)
                                <div role="tabpanel" class="tab-pane fade" id="why">
									<div class="about-text">
										<h2 class="tab-title">{{ $why->name }}</h2>
										<div class="content">
											{!! $why->text !!}
										</div>
									</div>
								</div>
                                @endforeach
								<!--/ End Single Tab -->
								<!-- Single Tab -->
								@foreach ($visions as $vision)
                                <div role="tabpanel" class="tab-pane fade" id="vision">
									<div class="about-text">
										<h2 class="tab-title">{{ $vision->name }}</h2>
										<div class="content">
											{!! $vision->text !!}
										</div>
									</div>
								</div>
                                @endforeach
								<!--/ End Single Tab -->
							</div>
						</div>
						<!--/ End About Tab -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End About Me -->
