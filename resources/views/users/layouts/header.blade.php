
		<!-- Start Header -->
		<header id="header">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-12 col-xs-12">
						<!-- Logo -->
                            @if($headers->count() == 0)
                            <div class="logo"><a href="{{ route('home') }}">{{ __('Home') }}</a></div>
                            @else
                            @foreach ($headers as $header)
                            @section('title', $header->title)
                                @if($header->status == 1)
                                <div class="logo">
                                    <div class="logo"><a href="{{ route('home') }}">{{ $header->name }}</a></div>
                                </div>
                                @else
                                <a href="{{ route('home') }}"><img style="margin-top: 15px" src="{{ asset('gallery/images/portfolio/header/images/'.$header->logo) }}" alt="{{ $header->logo }}"></a>
                                @endif
                            @endforeach
                            @endif

						<!--/ End Logo -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-md-10 col-sm-12 col-xs-12">
						<div class="nav-area">
							<!-- Main Menu -->
							<nav class="mainmenu">
								<div class="collapse navbar-collapse">
									<ul class="nav navbar-nav menu">
										@foreach ($navs as $nav)
                                        <li><a href="{{ $nav->link }}"><i class="{{ $nav->icon }}"></i>{{ $nav->name }}</a></li>
                                        @endforeach
									</ul>
									<ul class="social-icon">
										<li><a href="#header"><i class="fa fa-plus"></i></a></li>
									</ul>
									<ul class="social">
										@foreach ($socials as $social)
                                        <li><a href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a></li>
                                        @endforeach
									</ul>
								</div>
							</nav>
							<!--/ End Main Menu -->
						</div>
					</div>
				</div>
			</div>
		</header>
		<!--/ End Header -->
