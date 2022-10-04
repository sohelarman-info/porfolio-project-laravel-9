
		<!-- Start Count Down -->
		<section id="countdown" class="section" data-stellar-background-ratio="0.3">
			<div class="container">
				<div class="row">
					@foreach ($coundowns as $coundown)
                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
						<!-- Single Count -->
						<div class="single-count">
							<i class="{{ $coundown->icon }}"></i>
							<h2><span class="count">{{ $coundown->name }}</span></h2>
							<p>{!! $coundown->text !!}</p>
						</div>
						<!--/ End Single Count -->
					</div>
                    @endforeach
				</div>
			</div>
		</section>
		<!--/ End Count Down -->
