@extends('website::layouts.master')

@section('content')

    <!-- Content -->

    <div class="archive-header pt-50 pb-50 text-center">
        <div class="container">
            <h3 class="mb-30 text-center w-75 mx-auto">
                11 Companies That Hire for Remote Seasonal and Holiday Jobs
            </h3>
            <div class="post-meta text-muted d-flex align-items-center mx-auto justify-content-center">
                <div class="author d-flex align-items-center mr-30">
                    <img alt="jobhub" src="assets/imgs/avatar/ava_16.png" />
                    <span>Sarah Harding</span>
                </div>
                <div class="date mr-30">
                    <span><i class="fi-rr-edit mr-5 text-grey-6"></i>06 Sep 2022</span>
                </div>
                <div class="icons">
                    <a href="#"><i class="fi fi-rr-bookmark mr-5 text-muted"></i></a>
                    <a href="#"><i class="fi fi-rr-heart text-muted"></i></a>
                </div>
            </div>
        </div>
    </div>

    @include('website::layouts.latest-blog')

    @include('website::layouts.newsletter')

    <!-- End Content -->

@endsection
