<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Admin\Blog;
use Carbon\Carbon;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:is_super_admin');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::page();
        $start_counter = Blog::getStartCounter();
        return view('admin.Blogs.index',compact('blogs','start_counter'));
    }// end method


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.Blogs.create');
    }// end method


    /**
     * Store a newly created resource in storage.
     *
     * @param BlogRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BlogRequest $request)
    {

        try{
            $blog = Blog::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'excerpt' => $request->excerpt,
                'description'=> $request->description,
                'post_date'=> Carbon::now()->subDay()->format('m-d-Y'),
            ]);

            Blog::saveUpload($blog->id,'create','image','en','logo');

          return redirect(route('blogs.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
             return redirect(route('blogs.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }

    }// end method

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($blog_id)
    {
        $blog = Blog::whereId($blog_id)->first();
        if (!$blog){
            abort(404);
        }
        return view('admin.Blogs.edit',compact('blog'));
    }// end method

    /**
     *  Update the specified resource in storage.
     *
     * @param Blog $request
     * @param  $blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BlogRequest $request,$blog_id)
    {
        try {
            $blog = Blog::whereId($blog_id)->first();
            if (!$blog){
                abort(404);
            }

            Blog::whereId($blog->id)->update([
                // 'organization_id' => session('organization_id'),
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'excerpt' => $request->excerpt,
                'description'=> $request->description,
                'post_date'=> Carbon::now()->subDay()->format('m-d-Y'),
            ]);

            Blog::saveUpload($blog->id,'update','image','en','logo');

            return redirect(route('blogs.edit',$blog->id))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('blogs.edit',$blog->id))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method


    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($blog_id)
    {
        try {
            $blog = Blog::whereId($blog_id)->first();
            if (!$blog){
                abort(404);
            }
            $blog->delete();
            return redirect(route('blogs.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
        }catch (\Exception $e){
            return redirect(route('blogs.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method


}// end class
