<?php

namespace Modules\Website\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
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
        return view('website::pages.faqs');
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
        return view('website::pages.offers');
    }
    public function postSingle($id)
    {
        $blog = Blog::whereId($id)->with(['user','upload'])->first();
        return view('website::pages.blog-single' , compact('blog'));
    }

}
