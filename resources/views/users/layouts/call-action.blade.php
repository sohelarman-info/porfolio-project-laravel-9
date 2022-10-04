<!-- Start Call To Action -->
<section id="call-action" class="section wow fadeInUp">
    <div class="container">
        @foreach ($readysection as $ready)
        <div class="row">
            <div class="col-md-12">
                <div class="call-action-main">
                    <h2>{{ $ready->title }}</h2>
                    {!! $ready->text !!}
                    <div class="button">
                        <a href="#contact" class="btn"><i class="{{ $ready->icon }}"></i>{{ $ready->button }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!--/ End Call To Action -->
