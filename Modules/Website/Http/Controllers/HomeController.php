<?php

namespace Modules\Website\Http\Controllers;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('website::pages.index');
    }
    public function aboutUs()
    {
        return view('website::pages.about-us');
    }
    public function contactUs()
    {
        return view('website::pages.contact-us');
    }
    public function faqs()
    {
        return view('website::pages.faqs');
    }
    public function ourServices()
    {
        return view('website::pages.our-services');
    }
    public function blogs()
    {
        return view('website::pages.blogs');
    }
    public function offers()
    {
        return view('website::pages.offers');
    }
    public function blogSingle()
    {
        return view('website::pages.blog-single');
    }

}
