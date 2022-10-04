<!-- Start Contact -->
@foreach ($contactsection as $contact)
<section id="contact" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h1><span>{{ $contact->name }}</span><i class="fa fa-star"></i></h1>
                    {!! $contact->text !!}
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.4s">
                @if (session('Send'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        {{ session('Send') }}
                    </div>
                @endif
                <form class="form" method="post" action="{{ route('SendMail') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="@error('name') is-invalid @enderror" placeholder="Full Name" required="required">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="number" class="@error('number') is-invalid @enderror" placeholder="01777-777777" required="required">
                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Your Email" required="required">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="text" rows="6" placeholder="Type Your Message Here" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group button">
                                <button type="submit" class="button primary"><i class="fa fa-send"></i>Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--/ End Contact Form -->
            <!-- Contact Address -->
            @foreach ($contacts as $call)
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-delay="0.8s">
                <div class="contact">
                    <!-- Single Address -->
                    <div class="single-address">
                        <i class="fa fa-phone"></i>
                        <div class="title">
                            <h4>My Phone</h4>
                            <p>{{ $call->number1 }},<br>{{ $call->number2 }}</p>
                        </div>
                    </div>
                    <!--/ End Single Address -->
                    <!-- Single Address -->
                    <div class="single-address">
                        <i class="fa fa-envelope"></i>
                        <div class="title">
                            <h4>Email Address</h4>
                            <p>{{ $call->email1 }},<br>{{ $call->email2 }}</p>
                        </div>
                    </div>
                    <!--/ End Single Address -->
                    <!-- Single Address -->
                    <div class="single-address">
                        <i class="fa fa-map"></i>
                        <div class="title">
                            <h4>My Location</h4>
                            {!! $call->text !!}
                        </div>
                    </div>
                    <!--/ End Single Address -->
                </div>
            </div>
            @endforeach
            <!--/ End Contact Address -->
        </div>
    </div>
</section>
@endforeach
<!--/ End Contact -->
