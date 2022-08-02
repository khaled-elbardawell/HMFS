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

    <div class="section-box wow animate__animated animate__fadeIn mt-70">
        <div class="container">
            <div class="box-swiper">
                <div class="swiper-container swiper-group-6">
                    <div class="swiper-wrapper pt-5">
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="#"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/google.svg')}}" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="#"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/airbnb.svg')}}" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="#"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/dropbox.svg')}}" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="#"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/fedex.svg')}}" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="#"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/wallmart.svg')}}" /></a></div>
                        </div>
                        <div class="swiper-slide hover-up">
                            <div class="item-logo"><a href="#"><img alt="jobhub" src="{{CustomAsset('front/assets/imgs/slider/logo/hubspot.svg')}}" /></a></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <section class="section-box mt-70 mb-50">
        <div class="container">
            {{-- special class: most-popular --}}
            <div class="block-pricing">
                <div class="row">
                @foreach ($offers as $offer)
                    @if ($offer->offerFeatures->count() > 0)
                        <div class="col-lg-3 col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="box-pricing-item">
                                <div class="box-info-price">
                                    @php
                                        $sum = 0;
                                    @endphp
                                    @foreach ($offer->offerFeatures as $features)
                                    @php
                                        $sum += $features->value;
                                    @endphp
                                    @endforeach
                                    <span class="text-price for-month display-month">${{$sum}}</span>
                                    {{-- <span class="text-price for-year">$240</span> --}}
                                    <span class="text-month">/month</span>
                                </div>
                                <div>
                                    <h4 class="mb-15">{{$offer->name}}</h4>
                                    <p class="text-desc-package mb-30">
                                        {{$offer->description}}
                                    </p>
                                </div>
                                <ul class="list-package-feature">
                                    @foreach ($offer->offerFeatures as $features)
                                        <li>{{$features->key}}</li>
                                    @endforeach
                                </ul>
                                <div>
                                    <a href="{{route('createInfoPayments',['offer_id' => $offer->id])}}" class="btn btn-border">Choose plan</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('website::layouts.latest-blog',['blogs' => $latest_blog])

    {{-- @include('website::layouts.newsletter') --}}

<!-- End Content -->
@endsection
