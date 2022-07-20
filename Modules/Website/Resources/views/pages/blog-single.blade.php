@extends('website::layouts.master')

@section('content')

    <!-- Content -->

    <div class="archive-header pt-50 pb-50 text-center">
        <div class="container">
            <h3 class="mb-30 text-center w-75 mx-auto">
                {{$blog->title}}
            </h3>
            <div class="post-meta text-muted d-flex align-items-center mx-auto justify-content-center">
                <div class="author d-flex align-items-center mr-30">
                    <span>{{$blog->user->name}}</span>
                </div>
                <div class="date mr-30">
                    <span><i class="fi-rr-edit mr-5 text-grey-6"></i>{{$blog->post_date}}</span>
                </div>
            </div>
            <figure class="mb-30 mt-30">
                @isset($blog->upload->file)
                    <figure><img alt="{{$blog->title}}" src="{{CustomAsset('upload/images/full/'.$blog->upload->file)}}" /></figure>
                @else
                    <figure><img alt="HMFS" src="{{CustomAsset('front/assets/imgs/hmfs_logo_1.svg')}}" /></figure>
                @endisset
            </figure>
            <div class="excerpt mb-30">
                <p>{{$blog->excerpt}}</p>
            </div>
            <div class="single-content">
                <p>{{$blog->description}}</p>
            </div>
        </div>
    </div>

    @include('website::layouts.latest-blog')

    {{-- @include('website::layouts.newsletter') --}}

    <!-- End Content -->

@endsection
