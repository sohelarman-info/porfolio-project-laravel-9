
		<!-- Start Personal Area -->
		@foreach ($personals as $personal)
        <section id="personal-area">
			<div class="personal-main">
				<div class="personal-single">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<!-- Personal Text -->
								<div class="personal-text">
                                    @if (session('Send'))
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                            {{ session('Send') }}
                                        </div>
                                    @endif
									<div class="my-info">
										<h1>{{ $personal->name }}</h1>
										<h2 class="cd-headline clip is-full-width">
										   A Proffesional
										   <span class="cd-words-wrapper">
											   <b class="is-visible">{{ $personal->designation_1 }}</b>
											   <b>{{ $personal->designation_2 }}</b>
											   <b>{{ $personal->designation_3 }}</b>
											   <b>{{ $personal->designation_4 }}</b>
											   <b>{{ $personal->designation_5 }}</b>
											</span>
										</h2>
										<div class="button">
											<a href="{{ $personal->hire_link }}" class="btn primary shine"><i class="{{ $personal->hire_icon }}"></i>{{ $personal->hire_btn }}</a>
											<a href="{{ $personal->project_link }}" class="btn shine"><i class="{{ $personal->project_icon }}"></i>{{ $personal->project_btn }}</a>
										</div>
									</div>
								</div>
								<!--/ End Personal Text -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
        <style>
            #personal-area{
                background-image: url('{{ asset('gallery/images/portfolio/banner/'.$personal->image) }}');
                background-size: cover;
                background-repeat: no-repeat;
                height: 680px;
                position:relative;
                background-position: center;
            }
            #personal-area .personal-single::before {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background: url('');
                opacity: 0.5;
                content: "";
                z-index: -1;
            }
        </style>
        @endforeach
		<!--/ End Personal Area -->
