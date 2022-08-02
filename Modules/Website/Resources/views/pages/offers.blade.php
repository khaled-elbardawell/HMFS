@extends('website::layouts.master')

@section('content')

    <!-- Content -->

    <section class="section-box mt-90 mb-50">
        <div class="container">
            <div class="w-50 w-md-100 mx-auto text-center">
                <h3 class="mb-30 wow animate__animated animate__fadeInUp">Start saving time today and choose your best plan</h3>
            </div>
            <div class="mw-650 text-center wow animate__animated animate__fadeInUp">
                <p class="mb-35 text-md-lh24 color-black-5">Best for freelance developers who need to save their time</p>
            </div>
            {{-- special class: most-popular --}}
            <div class="block-pricing mt-125 mt-md-50">
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

    <!-- End Content -->

@endsection
