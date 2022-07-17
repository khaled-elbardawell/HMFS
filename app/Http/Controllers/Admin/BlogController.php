<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Http\Requests\Admin\DepartmentRequest;
use App\Models\Admin\Blog;
use App\Models\Admin\Department;


class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:blogs.index' , ['only' => ['index']]);
        $this->middleware('can:blogs.create', ['only' => ['create','store']]);
        $this->middleware('can:blogs.edit'  , ['only' => ['edit','update']]);
        $this->middleware('can:blogs.delete', ['only' => ['destroy']]);
    }



    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::where('organization_id',session('organization_id'))->page();
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
     * @param DepartmentRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(DepartmentRequest $request)
    {
        try{
            Blog::create(['name' => $request->name,'description'=> $request->description,'organization_id' => session('organization_id') ]);
          return redirect(route('blogs.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
             return redirect(route('blogs.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }

    }// end method




    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($blog_id)
    {
        $blog = Blog::where('organization_id',session('organization_id'))->whereId($blog_id)->first();
        if (!$blog){
            abort(404);
        }
        return view('admin.Blogs.edit',compact('blog'));
    }// end method




    /**
     *  Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param  $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BlogRequest $request,$blog_id)
    {
        try {
            $blog = Blog::where('organization_id',session('organization_id'))->whereId($blog_id)->first();
            if (!$blog){
                abort(404);
            }

           Department::whereId($blog->id)->update([
                'name'       => $request->name,
                'description'=> $request->description,
            ]);
            return redirect(route('blogs.edit',$blog->id))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('blogs.edit',$blog->id))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method





    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($blog_id)
    {
        try {
            $blog = Blog::where('organization_id',session('organization_id'))->whereId($blog_id)->first();
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
