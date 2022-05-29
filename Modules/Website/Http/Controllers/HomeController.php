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

}
