<!-- Start Testimonials -->
<section id="testimonials" class="section" data-stellar-background-ratio="0.3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h1><span>Clients</span> Testimonials<i class="fa fa-star"></i></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-carousel">
                    <!-- Single Testimonial -->
                    @foreach ($testimonials as $test)
                    <div class="single-testimonial">
                        <div class="testimonial-content">
                            <i class="fa fa-quote-left"></i>
                            <p>{!! $test->text !!}</p>
                        </div>
                        <div class="testimonial-info">
                            <img src="{{ asset('gallery/images/portfolio/testimonials/images/'.$test->image) }}" class="img-circle" alt="{{ $test->name }}">
                            <ul class="rating">
                                @php
                                    for($x = 1; $x <= $test->star; $x++ )
                                    echo '<li><i class="fa fa-star"></i></li>';
                                @endphp
                            </ul>
                            <h6>{{ $test->name }}<span>{{ $test->title }}</span></h6>
                        </div>
                    </div>
                    @endforeach
                    <!--/ End Single Testimonial -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Testimonials -->
