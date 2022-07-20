@extends('website::layouts.master')

@section('content')

    <!-- Content -->

    <section class="section-box bg-banner-about">
        <div class="banner-hero banner-about pt-20">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="block-banner">
                            <h1 class="heading-banner heading-lg">The #1 Job Board for Graphic Design Jobs</h1>
                            <div class="banner-description box-mw-70 mt-30">Search and connect with the right candidates faster. This talent seach gives you the opportunity to find candidates who may be a perfect fit for your role</div>
                            <div class="mt-60">
                                <div class="box-button-shadow mr-10">
                                    <a href="{{route('contactUs')}}" class="btn btn-default">Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="banner-imgs">
                            <img alt="jobhub" src="{{CustomAsset('front/assets/imgs/page/about/banner-img.png')}}" class="img-responsive main-banner shape-3" />
                            <span class="banner-sm-1"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/page/about/banner-sm-1.png')}}" class="img-responsive shape-1" /></span>
                            <span class="banner-sm-2"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/page/about/banner-sm-2.png')}}" class="img-responsive shape-1" /></span>
                            <span class="banner-sm-3"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/page/about/banner-sm-3.png')}}" class="img-responsive shape-2" /></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section-box mt-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <div class="row pt-5">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/page/about/market-research.svg')}}" /></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-20">Market Research</h5>
                                    <p class="text-normal mt-15 mb-20">It is a long established fact that a reader will be.</p>
                                    <a href="#" class="btn-readmore icon-arrow">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/page/about/market-research.svg')}}" /></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-20">Market Research</h5>
                                    <p class="text-normal mt-15 mb-20">It is a long established fact that a reader will be.</p>
                                    <a href="#" class="btn-readmore icon-arrow">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/page/about/market-research.svg')}}" /></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-20">Market Research</h5>
                                    <p class="text-normal mt-15 mb-20">It is a long established fact that a reader will be.</p>
                                    <a href="#" class="btn-readmore icon-arrow">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-md-30">
                            <div class="card-grid-4 hover-up">
                                <div class="image-top-feature">
                                    <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/page/about/market-research.svg')}}" /></figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-20">Market Research</h5>
                                    <p class="text-normal mt-15 mb-20">It is a long established fact that a reader will be.</p>
                                    <a href="#" class="btn-readmore icon-arrow">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="section-box mt-90 mb-80">
        <div class="container">
            <div class="block-job-bg block-job-bg-homepage-2">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 d-none d-md-block">
                        <div class="box-image-findjob findjob-homepage-2 ml-0 wow animate__animated animate__fadeIn">
                            <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/page/about/img-findjob.png')}}" /></figure>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="box-info-job pl-90 pt-30 pr-90">
                            <span class="text-blue wow animate__animated animate__fadeInUp">Find Offers</span>
                            <h5 class="heading-36 mb-30 mt-30 wow animate__animated animate__fadeInUp">Create free count and start apply your dream job today</h5>
                            <p class="text-lg wow animate__animated animate__fadeInUp">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is
                                simply dummy.
                            </p>
                            <div class="mt-30 wow animate__animated animate__fadeInUp">
                                <a href="job-grid.html" class="btn btn-default">Explore more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section-box mt-90 mt-md-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <span class="text-lg text-brand wow animate__animated animate__fadeInUp">Online Marketing</span>
                    <h3 class="mt-20 mb-30 wow animate__animated animate__fadeInUp">Committed to top quality and results</h3>
                    <p class="mb-20 wow animate__animated animate__fadeInUp">Proin ullamcorper pretium orci. Donec necscele risque leo. Nam massa dolor imperdiet neccon sequata congue idsem. Maecenas malesuada faucibus finibus. </p>
                    <p class="mb-30 wow animate__animated animate__fadeInUp">Proin ullamcorper pretium orci. Donec necscele risque leo. Nam massa dolor imperdiet neccon sequata congue idsem. Maecenas malesuada faucibus finibus. </p>
                    <div class="mt-10 wow animate__animated animate__fadeInUp">
                        <a href="#" class="btn btn-default">Learn more</a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-12 pl-200 d-none d-lg-block">
                    <div class="banner-imgs banner-imgs-about">
                        <img alt="jobhub" src="{{CustomAsset('front/assets/imgs/page/about/banner-online-marketing.png')}}" class="img-responsive main-banner shape-3" />
                        <span class="banner-sm-4"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/banner/congratulation.svg')}}" class="img-responsive shape-2" /></span>
                        <span class="banner-sm-5"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/banner/web-dev.svg')}}" class="img-responsive shape-1" /></span>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="section-box mt-90 mt-md-50">
        <div class="container">
            <h2 class="section-title text-center mb-15 wow animate__animated animate__fadeInUp">Meet our team</h2>
            <div class="text-normal text-center color-black-5 box-mw-60 wow animate__animated animate__fadeInUp">
                Find the type of work you need, clearly defined and ready to start. Work begins as soon as you purchase and provide requirements.
            </div>
            <div class="row mt-60">
                <div class="col-lg-4 col-md-6">
                    <div class="card-grid-2  wow animate__animated animate__fadeIn">
                        <div class="text-center card-grid-2-image">
                            <a href="#">
                                <figure><img src="{{CustomAsset('front/assets/imgs/page/about/marc8.png')}}" alt="jobhub" /></figure>
                            </a>
                        </div>
                        <div class="card-block-info pt-10 text-center">
                            <h5 class="font-bold text-lg mb-5">Warren Buffett</h5>
                            <p class="text-small text-muted">Marketing Crew</p>
                            <div class="card-2-bottom mt-15">
                                <a href="#" class="card-grid-2-socials icon-fb-sym"></a>
                                <a href="#" class="card-grid-2-socials icon-tw-sym"></a>
                                <a href="#" class="card-grid-2-socials icon-inst-sym"></a>
                                <a href="#" class="card-grid-2-socials icon-linkedin-sym"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card-grid-2  wow animate__animated animate__fadeIn">
                        <div class="text-center card-grid-2-image">
                            <a href="#">
                                <figure><img src="{{CustomAsset('front/assets/imgs/page/about/marc8.png')}}" alt="jobhub" /></figure>
                            </a>
                        </div>
                        <div class="card-block-info pt-10 text-center">
                            <h5 class="font-bold text-lg mb-5">Warren Buffett</h5>
                            <p class="text-small text-muted">Marketing Crew</p>
                            <div class="card-2-bottom mt-15">
                                <a href="#" class="card-grid-2-socials icon-fb-sym"></a>
                                <a href="#" class="card-grid-2-socials icon-tw-sym"></a>
                                <a href="#" class="card-grid-2-socials icon-inst-sym"></a>
                                <a href="#" class="card-grid-2-socials icon-linkedin-sym"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card-grid-2  wow animate__animated animate__fadeIn">
                        <div class="text-center card-grid-2-image">
                            <a href="#">
                                <figure><img src="{{CustomAsset('front/assets/imgs/page/about/marc8.png')}}" alt="jobhub" /></figure>
                            </a>
                        </div>
                        <div class="card-block-info pt-10 text-center">
                            <h5 class="font-bold text-lg mb-5">Warren Buffett</h5>
                            <p class="text-small text-muted">Marketing Crew</p>
                            <div class="card-2-bottom mt-15">
                                <a href="#" class="card-grid-2-socials icon-fb-sym"></a>
                                <a href="#" class="card-grid-2-socials icon-tw-sym"></a>
                                <a href="#" class="card-grid-2-socials icon-inst-sym"></a>
                                <a href="#" class="card-grid-2-socials icon-linkedin-sym"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- @include('website::layouts.testimonials') --}}

    @include('website::layouts.latest-blog')

    {{-- @include('website::layouts.newsletter') --}}

    <!-- End Content -->

@endsection
