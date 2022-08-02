<?php

namespace Modules\Website\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Contact;
use App\Models\Admin\Offer;
use App\Models\Admin\OfferFeatures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{

    public function index()
    {
        $latest_blog = Blog::with(['user','upload'])->orderByDesc('updated_at')->limit(6)->get();
        $offers =Offer::with(['offerFeatures'])->orderByDesc('updated_at')->limit(4)->get();
        return view('website::pages.index',compact('latest_blog','offers'));
    }
    public function aboutUs()
    {
        $latest_blog = Blog::with(['user','upload'])->orderByDesc('updated_at')->limit(6)->get();
        return view('website::pages.about-us',compact('latest_blog'));
    }
    public function contactUs()
    {
        return view('website::pages.contact-us');
    }
    public function sendContactUs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|min:8|max:20',
            'subject' => 'required|string|min:3|max:255',
            'message' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->route('contactUs')
                        ->withErrors($validator)
                        ->withInput();
        }

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('contactUs')->with([
            'status' => true,
            'message' => 'Send Request is Successfully'
        ]);
    }
    public function faqs()
    {
        $latest_blog = Blog::with(['user','upload'])->orderByDesc('updated_at')->limit(6)->get();
        return view('website::pages.faqs',compact('latest_blog'));
    }
    public function ourServices()
    {
        return view('website::pages.our-services');
    }
    public function posts()
    {
        $blogs = Blog::with(['user','upload'])->get();
        return view('website::pages.blogs',compact('blogs'));
    }
    public function offers()
    {
        $offers =Offer::with(['offerFeatures'])->get();
        $latest_blog = Blog::with(['user','upload'])->orderByDesc('updated_at')->limit(6)->get();
        return view('website::pages.offers',compact('offers','latest_blog'));
    }
    public function postSingle($id)
    {
        $blog = Blog::whereId($id)->with(['user','upload'])->first();
        $latest_blog = Blog::where('id','<>',$id)->with(['user','upload'])->orderByDesc('updated_at')->limit(6)->get();
        return view('website::pages.blog-single' , compact('blog','latest_blog'));
    }
}
