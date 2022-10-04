<!-- Start Pricing Table -->
@foreach ($pricings as $pricing)
<section id="pricing" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h1><span>{{ $pricing->name }}</span><i class="fa fa-history"></i></h1>
                    <p>{!! $pricing->text !!}<p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Table -->
            @foreach ($prices as $price)
            <div class="col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay="0.4s">
                <div class="single-table">
                    <!-- Table Head -->
                    <div class="table-head">
                        <h2 class="title">{{ $price->name }}</h2>
                        <div class="price">
                            <p class="amount">{{ $price->sign }}<span>{{ $price->price }}</span>/{{ $price->duration }}</p>
                        </div>
                        <i class="{{ $price->icon }}"></i>
                    </div>
                    <!-- Table List -->
                    <ul class="table-list">
                        {!! $price->text !!}
                    </ul>
                    <!-- Table Bottom -->
                    <div class="table-bottom">
                        <a class="btn shine" href="{{ $price->link }}">{{ $price->button }}<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End Single Table-->
        </div>
    </div>
</section>
@endforeach
<!--/ End Pricing Table -->
