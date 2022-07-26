<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="{{CustomAsset('front/assets/imgs/theme/loading.gif')}}" alt="jobhub" />
            </div>
        </div>
    </div>
</div>
<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a href="{{route('index')}}" class="d-flex">
                        <img alt="HMFS" height="75px" class="w-75" src="{{CustomAsset('front/assets/imgs/logo-horizontal.svg')}}" />
                    </a>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li>
                                <a class="active" href="{{route('index')}}">Home</a>
                            </li>
                            <li>
                                <a class="active" href="{{route('offers-front')}}">Offers</a>
                            </li>
                            <li>
                                <a class="active" href="{{route('posts')}}">Blogs</a>
                            </li>
                            <li>
                                <a class="active" href="{{route('contactUs')}}">Contact Us</a>
                            </li>
                            <li>
                                <a class="active" href="{{route('aboutUs')}}">About Us</a>
                            </li>
                            <li>
                                <a class="active" href="{{route('faqs')}}">FAQs</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
            </div>
            <div class="header-right">
                <div class="block-signin">
                    <a href="#" class="text-link-bd-btom btn-sm hover-up">Apply Now</a>
                    <a href="#" class="btn btn-default  btn-sm btn-shadow ml-40 hover-up">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="user-account">
                <img src="{{CustomAsset('front/assets/imgs/avatar/ava_1.png')}}" alt="HMFS" />
                <div class="content">
                    <h6 class="user-name">Howdy, <span class="text-brand">AliThemes</span></h6>
                    <p class="font-xs text-muted">You have 2 new messages</p>
                </div>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-search mobile-header-border mb-30">
                    <form action="#">
                        <input type="text" placeholder="Search for items…" />
                        <i class="fi-rr-search"></i>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li>
                                <a class="active" href="{{route('index')}}">Home</a>
                            </li>
                            <li>
                                <a class="active" href="{{route('offers-front')}}">Offers</a>
                            </li>
                            <li>
                                <a class="active" href="{{route('posts')}}">Blogs</a>
                            </li>
                            <li>
                                <a class="active" href="{{route('aboutUs')}}">Contact Us</a>
                            </li>
                            <li>
                                <a class="active" href="{{route('contactUs')}}">About Us</a>
                            </li>
                            <li class="has-children">
                                <a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('ourServices')}}">Our Services</a></li>
                                    <li><a href="{{route('faqs')}}">FAQs</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-account">
                    <h6 class="mb-10">Your Account</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Account Settings</a></li>
                        <li><a href="#">Sign Out</a></li>
                    </ul>
                </div>
                {{-- <div class="mobile-social-icon mb-50">
                    <h6 class="mb-25">Follow Us</h6>
                    <a href="#"><img src="{{CustomAsset('front/assets/imgs/theme/icons/icon-facebook.svg')}} alt="jobhub" /></a>
                    <a href="#"><img src="{{CustomAsset('front/assets/imgs/theme/icons/icon-twitter.svg')}} alt="jobhub" /></a>
                    <a href="#"><img src="{{CustomAsset('front/assets/imgs/theme/icons/icon-instagram.svg')}} alt="jobhub" /></a>
                    <a href="#"><img src="{{CustomAsset('front/assets/imgs/theme/icons/icon-pinterest.svg')}} alt="jobhub" /></a>
                    <a href="#"><img src="{{CustomAsset('front/assets/imgs/theme/icons/icon-youtube.svg')}} alt="jobhub" /></a>
                </div> --}}
                <div class="site-copyright">Copyright 2022 © HMFS. <br />Designed by AliThemes.</div>
            </div>
        </div>
    </div>
</div>
<!--End header-->
