@extends('website::layouts.master')

@section('content')
<!-- Content -->

<div class="container mt-90 mt-md-30">

    <div class="row">
        <div class="col-md-12">
            @if(session()->get('status') == true)
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <section class="mb-50">
                <h5 class="text-blue text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Get in Touch</h5>
                <h3 class="section-title w-75 w-md-100 mb-50 mt-15 text-center mx-auto wow animate__animated animate__fadeInUp" data-wow-delay=".1s">You are always welcome to Contact Us</h3>
                <div class="row mb-60">
                    <div class="col-md-4 mb-4 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h5 class="mb-15">Location</h5>
                        <span>205 North Michigan Avenue, Suite 810<br> Chicago, 60601, USA</span>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0 mt-sm-30 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h5 class="mb-15">Phone</h5>
                        <abbr title="Phone">Phone:</abbr> <span>(123) 456-7890</span>
                    </div>
                    <div class="col-md-4 mt-sm-30 wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                        <h5 class="mb-15">Email</h5>
                        <abbr title="Email">Email: </abbr><a href="../../../cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="ddbeb2b3a9bcbea99db7a8bfb5a8bff3beb2b0"> Test Email </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9 col-md-12 mx-auto">
                        <div class="contact-from-area padding-20-row-col">
                            <h5 class="text-blue text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Send Message</h5>
                            <h2 class="section-title mt-15 mb-10 text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Drop Us a Line</h2>
                            <p class="text-muted mb-30 font-md text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Your email address will not be published. Required fields are marked *</p>
                            <form class="contact-form-style mt-80" id="contact-form" action="{{route('sendContactUs')}}" method="POST">
                                @csrf
                                <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="name" placeholder="Name *" type="text">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="email" placeholder="Your Email *" type="email">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="phone" placeholder="Your Phone *" type="tel">
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="subject" placeholder="Subject *" type="text">
                                            @error('subject')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-12 col-md-12 text-center">
                                        <div class="textarea-style mb-30">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <button class="submit submit-auto-width" type="submit">Send message</button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- End Content -->
@endsection
