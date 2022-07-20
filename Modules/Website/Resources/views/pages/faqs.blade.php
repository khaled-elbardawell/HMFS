@extends('website::layouts.master')

@section('content')
<!-- Content -->

    <section class="section-box">
        <div class="container pt-50">
            <div class="w-50 w-md-100 mx-auto text-center">
                <h1 class="section-title-large mb-30 wow animate__animated animate__fadeInUp">FAQs</h1>
                <p class="mb-30 text-muted wow animate__animated animate__fadeInUp font-md">This is part of our help center where frequently asked questions are collected. Do a search here before sending a message or contacting us, here are the most common problems you will encounter when using our system.</p>
            </div>
        </div>
    </section>

    <section>
        <div class="faqs-imgs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="row">
                            <div class="col-lg-7">
                                <img class="faqs-1 wow animate__animated animate__fadeIn" data-wow-delay=".1s" src="assets/imgs/page/faqs/img-1.png" alt="">
                            </div>
                            <div class="col-lg-5">
                                <img class="faqs-2 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".3s" src="assets/imgs/page/faqs/img-2.png" alt="">
                                <img class="faqs-3 wow animate__animated animate__fadeIn" data-wow-delay=".5s" src="assets/imgs/page/faqs/img-3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Change Tax Account on Envato?
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Reset Password With Phone Number?
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    Create Account On Finansi App?
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    Create Account On Finansi App?
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="section-box bg-blue-full mt-90 mb-50">
        <div class="container">
            <h3 class="mb-20">Want to talk about ideas? <br>Let's get started right now.</h3>
            <div class="row">
                <div class="col-lg-6">
                    <p class="text-gray-200">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
                <div class="col-lg-6 pl-100 pl-md-15 mt-md-50">
                    <div class="box-button-shadow mr-20">
                        <a href="{{route('contactUs')}}" class="btn btn-default">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('website::layouts.latest-blog')

    {{-- @include('website::layouts.newsletter') --}}

<!-- End Content -->
@endsection
