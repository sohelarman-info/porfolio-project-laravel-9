<!-- Start Clients -->
<div id="clients" class="section" data-stellar-background-ratio="0.3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="clients-slider">
                    @foreach ($payments as $payment)
                    <!-- Single Clients -->
                    <div class="single-clients">
                        <a href="#" target="_blank"><img src="{{ asset('gallery/images/portfolio/payment/'.$payment->image) }}" alt="{{ $payment->image }}"></a>
                    </div>
                    <!--/ End Single Clients -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Clients -->
