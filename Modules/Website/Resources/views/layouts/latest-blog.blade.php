<section class="section-box mt-70">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7 col-md-7">
                <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".1s">From blog</h2>
                <p class="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".1s">Latest News & Events</p>
            </div>
            <div class="col-lg-5 col-md-5 text-lg-end text-start">
                <a href="{{route('posts')}}" class="btn btn-border icon-chevron-right wow animate__animated animate__fadeInUp hover-up mt-15" data-wow-delay=".1s">View more</a>
            </div>
        </div>
        <div class="row mt-70">
            <div class="box-swiper">
                <div class="swiper-container swiper-group-3">
                    <div class="swiper-wrapper pb-70 pt-5">
                        @foreach ($blogs as $blog)
                            <div class="swiper-slide">
                                <div class="card-grid-3 hover-up">
                                    <div class="text-center card-grid-3-image">
                                        <a href="{{route('blogSingle',$blog->id)}}">
                                            @isset($blog->upload->file)
                                                <figure><img alt="{{$blog->title}}" src="{{CustomAsset('upload/images/full/'.$blog->upload->file)}}" /></figure>
                                            @else
                                                <figure><img alt="HMFS" src="{{CustomAsset('front/assets/imgs/hmfs_logo_1.svg')}}" /></figure>
                                            @endisset
                                        </a>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="row">
                                            <div class="col-lg-6 col-6 text-start">
                                                <span>{{$blog->user->name}}</span>
                                            </div>
                                            <div class="col-lg-6 col-6 text-end">
                                                <span>{{$blog->post_date}}</span>
                                            </div>
                                        </div>
                                        <h5 class="mt-15 heading-md"><a href="{{route('blogSingle',$blog->id)}}">{{$blog->title}}</a></h5>
                                        <div class="card-2-bottom mt-50">
                                            <div class="row">
                                                <div class="col-lg-9 col-8">
                                                    <a href="{{route('blogSingle',$blog->id)}}" class="btn btn-border btn-brand-hover">Keep reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination swiper-pagination3"></div>
                </div>
            </div>
        </div>
    </div>
</section>
