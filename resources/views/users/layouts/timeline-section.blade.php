<!-- Start Timeline-->
<section id="my-timeline" class="section clearfix">
    @foreach ($educations as $education)
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h1><span>{{ $education->name }}</span><i class="fa fa-history"></i></h1>
                    <p>{!! $education->text !!}<p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="timeline">
                    <div class="timeline-inner">
                        <!-- Single Timeline -->
                        @foreach ($studies as $study)
                        <div class="single-main wow fadeInLeft" data-wow-delay="0.4s">
                            <div class="single-timeline">
                                <div class="single-content">
                                    <div class="date">
                                        <p>{{ $study->end }}<span></span></p>
                                    </div>
                                    <h2>{{ $study->title }}</h2>
                                    <p>{!! $study->text !!}<p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!--/ End Single Timeline -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>
<!--/ End Timeline -->
