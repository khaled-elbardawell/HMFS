@extends('website::layouts.master')

@section('content')
<!-- Content -->
    <section class="section-box mt-70">
        <div class="banner-hero hero-1">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="block-banner">
                            <span class="text-small-primary text-small-primary--disk text-uppercase wow animate__animated animate__fadeInUp">Best jobs place</span>
                            <h1 class="heading-banner wow animate__animated animate__fadeInUp">The Easiest Way to Get Your New ofer</h1>
                            <div class="banner-description mt-30 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Each month, more than 3 million job seekers turn to website in their search for work, making over 140,000 applications every single day</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-imgs">
                            <img alt="jobhub" src="{{CustomAsset('front/assets/imgs/banner/banner.png')}}" class="img-responsive shape-1" />
                            <span class="union-icon"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/banner/union.svg')}}" class="img-responsive shape-3" /></span>
                            <span class="congratulation-icon"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/banner/congratulation.svg')}}" class="img-responsive shape-2" /></span>
                            <span class="docs-icon"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/banner/docs.svg')}}" class="img-responsive shape-2" /></span>
                            <span class="course-icon"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/banner/course.svg')}}" class="img-responsive shape-3" /></span>
                            <span class="web-dev-icon"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/banner/web-dev')}}.svg" class="img-responsive shape-3" /></span>
                            <span class="tick-icon"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/banner/tick.svg')}}" class="img-responsive shape-3" /></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-70">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp">Browse Offers</h2>
                    <p class="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp">Find the type of work
                        you need, clearly defined and ready to start. Work begins as soon as you purchase and provide
                        requirements.</p>
                </div>
                <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <a href="job-grid-2.html" class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">Browse all</a>
                </div>
            </div>
            <div class="row mt-70">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card-grid hover-up wow animate__animated animate__fadeInUp">
                        <div class="text-center">
                            <a href="job-grid.html">
                                <figure>
                                    <img alt="jobhub" src="{{CustomAsset('front/assets/imgs/theme/icons/marketing.svg')}}" />
                                </figure>
                            </a>
                        </div>
                        <h5 class="text-center mt-20 card-heading"><a href="job-grid.html">Marketing & Communication</a>
                        </h5>
                        <p class="text-center text-stroke-40 mt-20">156 Available Vacancy</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card-grid hover-up wow animate__animated animate__fadeInUp">
                        <div class="text-center">
                            <a href="job-grid.html">
                                <figure>
                                    <img alt="jobhub" src="{{CustomAsset('front/assets/imgs/theme/icons/marketing.svg')}}" />
                                </figure>
                            </a>
                        </div>
                        <h5 class="text-center mt-20 card-heading"><a href="job-grid.html">Marketing & Communication</a>
                        </h5>
                        <p class="text-center text-stroke-40 mt-20">156 Available Vacancy</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card-grid hover-up wow animate__animated animate__fadeInUp">
                        <div class="text-center">
                            <a href="job-grid.html">
                                <figure>
                                    <img alt="jobhub" src="{{CustomAsset('front/assets/imgs/theme/icons/marketing.svg')}}" />
                                </figure>
                            </a>
                        </div>
                        <h5 class="text-center mt-20 card-heading"><a href="job-grid.html">Marketing & Communication</a>
                        </h5>
                        <p class="text-center text-stroke-40 mt-20">156 Available Vacancy</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card-grid hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="text-center mt-15">
                            <h3>18,265+</h3>
                        </div>
                        <p class="text-center mt-30 text-stroke-40">Jobs are waiting for you</p>
                        <div class="text-center mt-30">
                            <div class="box-button-shadow"><a href="job-grid.html" class="btn btn-default">Explore more</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-box wow animate__animated animate__fadeIn mt-70">
        <div class="container">
            <div class="box-swiper">
                <div class="swiper-container swiper-group-6">
                    <div class="swiper-wrapper pb-70 pt-5">
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/google.svg')}}" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/airbnb.svg')}}" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/dropbox.svg')}}" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/fedex.svg')}}" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/wallmart.svg')}}" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/hubspot.svg')}}" /></a></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <section class="section-box mt-70">
        <div class="container">
            {{-- <div class="text-center mt-20">
                <span class="text-lg text-billed">Billed Yearly</span>
                <label class="switch ml-20 mr-20">
                    <input type="checkbox" id="cb_billed_type" name="billed_type" onchange="checkBilled()" />
                    <span class="slider round"></span>
                </label>
                <span class="text-lg text-billed">Billed Monthly</span>
            </div> --}}
            <div class="block-pricing mt-50">
                <div class="row">
                    <div class="col-lg-3 col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <div class="box-pricing-item">
                            <div class="box-info-price">
                                <span class="text-price for-month display-month">$20</span>
                                <span class="text-price for-year">$240</span>
                                <span class="text-month">/month</span>
                            </div>
                            <div>
                                <h4 class="mb-15">Intro</h4>
                                <p class="text-desc-package mb-30">
                                    For most businesses that want to otpimize web queries
                                </p>
                            </div>
                            <ul class="list-package-feature">
                                <li>All limited links</li>
                                <li>Own analytics platform</li>
                                <li>Chat support</li>
                                <li>Optimize hashtags</li>
                                <li>Unlimited users</li>
                            </ul>
                            <div>
                                <a href="#" class="btn btn-border">Choose plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="box-pricing-item">
                            <div class="box-info-price">
                                <span class="text-price for-month display-month">$50</span>
                                <span class="text-price for-year">$600</span>
                                <span class="text-month">/month</span>
                            </div>
                            <div>
                                <h4 class="mb-15">Base</h4>
                                <p class="text-desc-package mb-30">
                                    For most businesses that want to otpimize web queries
                                </p>
                            </div>
                            <ul class="list-package-feature">
                                <li>All limited links</li>
                                <li>Own analytics platform</li>
                                <li>Chat support</li>
                                <li>Optimize hashtags</li>
                                <li>Unlimited users</li>
                            </ul>
                            <div>
                                <a href="#" class="btn btn-border">Choose plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="box-pricing-item most-popular">
                            <div class="text-end mb-10">
                                <a href="#" class="btn btn-white-sm">Most popular</a>
                            </div>
                            <div class="box-info-price">
                                <span class="text-price for-month display-month">$100</span>
                                <span class="text-price for-year">$1200</span>
                                <span class="text-month">/month</span>
                            </div>
                            <div>
                                <h4 class="mb-15">Pro</h4>
                                <p class="text-desc-package mb-30">
                                    For most businesses that want to otpimize web queries
                                </p>
                            </div>
                            <ul class="list-package-feature">
                                <li>All limited links</li>
                                <li>Own analytics platform</li>
                                <li>Chat support</li>
                                <li>Optimize hashtags</li>
                                <li>Unlimited users</li>
                            </ul>
                            <div>
                                <a href="#" class="btn btn-border">Choose plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <div class="box-pricing-item">
                            <div class="box-info-price">
                                <span class="text-price for-month display-month">$200</span>
                                <span class="text-price for-year">$2400</span>
                                <span class="text-month">/month</span>
                            </div>
                            <div>
                                <h4 class="mb-15">Enterprise</h4>
                                <p class="text-desc-package mb-30">
                                    For most businesses that want to otpimize web queries
                                </p>
                            </div>
                            <ul class="list-package-feature">
                                <li>All limited links</li>
                                <li>Own analytics platform</li>
                                <li>Chat support</li>
                                <li>Optimize hashtags</li>
                                <li>Unlimited users</li>
                            </ul>
                            <div>
                                <a href="#" class="btn btn-border">Choose plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section-box mt-40">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-4">
                    <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp">Recent Jobs</h2>
                    <p class="text-md-lh28 color-black-5wow animate__animated animate__fadeInUp" data-wow-delay=".1s">8 new
                        opportunities posted today!</p>
                </div>
                <div class="col-lg-8 text-xl-end text-start">
                    <ul class="nav nav-right float-xl-end float-start" role="tablist">
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".1s"><button id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one-1" aria-selected="true" class="active">Design</button></li>
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".2s"><button id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two-1" aria-selected="false">Marketing</button></li>
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".3s"><button id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three-1" aria-selected="false">Design</button></li>
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".4s"><button id="nav-tab-four-1" data-bs-toggle="tab" data-bs-target="#tab-four-1" type="button" role="tab" aria-controls="tab-four-1" aria-selected="false">Service</button></li>
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".5s"><button id="nav-tab-five-1" data-bs-toggle="tab" data-bs-target="#tab-five-1" type="button" role="tab" aria-controls="tab-five-1" aria-selected="false">Health Care</button></li>
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".6s"><button id="nav-tab-six-1" data-bs-toggle="tab" data-bs-target="#tab-six-1" type="button" role="tab" aria-controls="tab-six-1" aria-selected="false">Writing</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-70">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-four-1" role="tabpanel" aria-labelledby="tab-four-1">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-five-1" role="tabpanel" aria-labelledby="tab-five-1">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-six-1" role="tabpanel" aria-labelledby="tab-six-1">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-grid-2 hover-up">
                                    <div class="text-center card-grid-2-image">
                                        <a href="job-single.html">
                                            <figure><img src="{{CustomAsset('front/assets/imgs/jobs/job-1.png')}}" alt="jobhub" /></figure>
                                        </a>
                                        <label class="btn-urgent">Urgent</label>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-7 col-6">
                                                <a href="employers-single.html" class="card-2-img-text">
                                                    <span class="card-grid-2-img-small"><img src="{{CustomAsset('front/assets/imgs/jobs/logos/logo-1.svg')}}" alt="jobhub" /></span> <span>Alithemes</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-5 col-6 text-end">
                                                <a href="#" class="btn btn-grey-small disc-btn">Fulltime</a>
                                            </div>
                                        </div>
                                        <h5 class="mt-20"><a href="job-single.html">Senior Full Stack Engineer, Creator Success Full Time</a></h5>
                                        <div class="mt-15">
                                            <span class="card-time">3 mins ago</span>
                                            <span class="card-location">Chicago</span>
                                        </div>
                                        <div class="card-2-bottom mt-30">
                                            <div class="row">
                                                <div class="col-lg-7 col-8">
                                                    <span class="card-text-price"> $3200<span>/Month</span> </span>
                                                </div>
                                                <div class="col-lg-5 col-4 text-end">
                                                    <span><img src="{{CustomAsset('front/assets/imgs/theme/icons/shield-check.svg')}}" alt="jobhub" /></span>
                                                    <span class="ml-5"><img src="{{CustomAsset('front/assets/imgs/theme/icons/bookmark.svg')}}" alt="jobhub" /></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="section-box mt-50 mb-70 bg-patern">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="content-job-inner">
                        <h2 class="section-title heading-lg wow animate__animated animate__fadeInUp">The #1 Job Board for Graphic Design Jobs</h2>
                        <div class="mt-40 pr-50 text-md-lh28 wow animate__animated animate__fadeInUp">Search and connect with the right candidates faster. This talent seach gives you the opportunity to find candidates who may be a perfect fit for your role</div>
                        <div class="mt-40">
                            <div class="box-button-shadow wow animate__animated animate__fadeInUp"><a href="#" class="btn btn-default">Post a job now</a></div>
                            <a href="#" class="btn btn-link wow animate__animated animate__fadeInUp">Learn more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="box-image-job">
                        <figure class=" wow animate__animated animate__fadeIn"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/blog/img-job.png')}}" /></figure>
                        <div class="job-top-creator">
                            <div class="job-top-creator-head">
                                <h5>Top Freelancers</h5>
                            </div>
                            <ul>
                                <li>
                                    <div>
                                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/avatar/ava_13.png')}}" /></figure>
                                        <div class="job-info-creator">
                                            <strong>Kate Adie</strong>
                                            <span>UI/UX Designer</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/avatar/ava_14.png')}}" /></figure>
                                        <div class="job-info-creator">
                                            <strong>John Lennon</strong>
                                            <span>Senior Art Director</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/avatar/ava_15.png')}}" /></figure>
                                        <div class="job-info-creator">
                                            <strong>Nadine Coyle</strong>
                                            <span>Photographer</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/avatar/ava_16.png')}}" /></figure>
                                        <div class="job-info-creator">
                                            <strong>Sarah Harding</strong>
                                            <span>Motion Designer</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <div class="section-box">
        <div class="container">
            <ul class="list-partners">
                <li class="wow animate__animated animate__fadeInUp hover-up" data-wow-delay="0s">
                    <a href="#">
                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/jobs/logos/samsung.svg')}}" /></figure>
                    </a>
                </li>
                <li class="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".1s">
                    <a href="#">
                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/jobs/logos/google.svg')}}" /></figure>
                    </a>
                </li>
                <li class="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".2s">
                    <a href="#">
                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/jobs/logos/facebook.svg')}}" /></figure>
                    </a>
                </li>
                <li class="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".3s">
                    <a href="#">
                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/jobs/logos/pinterest.svg')}}" /></figure>
                    </a>
                </li>
                <li class="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".4s">
                    <a href="#">
                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/jobs/logos/avaya.svg')}}" /></figure>
                    </a>
                </li>
                <li class="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".5s">
                    <a href="#">
                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/jobs/logos/forbes.svg')}}" /></figure>
                    </a>
                </li>
                <li class="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".1s">
                    <a href="#">
                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/jobs/logos/avis.svg')}}" /></figure>
                    </a>
                </li>
                <li class="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".2s">
                    <a href="#">
                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/jobs/logos/nielsen.svg')}}" /></figure>
                    </a>
                </li>
                <li class="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".3s">
                    <a href="#">
                        <figure><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/jobs/logos/doordash.svg')}}" /></figure>
                    </a>
                </li>
            </ul>
        </div>
    </div> --}}

    @include('website::layouts.latest-blog')

    {{-- @include('website::layouts.newsletter') --}}

<!-- End Content -->
@endsection
