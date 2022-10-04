
		<!-- Start Service -->
		@foreach ($services as $servicesection)
        <section id="my-service" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h1>{{ $servicesection->name }}<i class="fa fa-rocket"></i></h1>
							{!! $servicesection->text !!}
						</div>
					</div>
				</div>
				<div class="row">
					@foreach ($SerItem as $service)
                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="0.4s">
						<!-- Single Service -->
						<div class="single-service">
							<i class="{{ $service->icon }}"></i>
							<h2>{{ $service->name }}</h2>
							<p>{!! $service->text !!}</p>
						</div>
						<!-- End Single Service -->
					</div>
                    @endforeach
				</div>
			</div>
		</section>
        @endforeach
		<!--/ End Service -->
