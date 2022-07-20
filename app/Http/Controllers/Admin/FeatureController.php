<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Http\Requests\Admin\FeatureRequest;
use App\Models\Admin\Blog;
use App\Models\Admin\Feature;
use Carbon\Carbon;

class FeatureController extends Controller
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
        $features = Feature::page();
        $start_counter = Feature::getStartCounter();
        return view('admin.Features.index',compact('features','start_counter'));
    }// end method


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.Features.create');
    }// end method


    /**
     * Store a newly created resource in storage.
     *
     * @param BlogRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(FeatureRequest $request)
    {

        try{
            $feature = Feature::create([
                'key' => $request->key,
                'value' => $request->value,
            ]);

          return redirect(route('features.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
             return redirect(route('features.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }

    }// end method

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($feature_id)
    {
        $feature = Feature::whereId($feature_id)->first();
        if (!$feature){
            abort(404);
        }
        return view('admin.Features.edit',compact('feature'));
    }// end method

    /**
     *  Update the specified resource in storage.
     *
     * @param Blog $request
     * @param  $blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(FeatureRequest $request,$feature_id)
    {
        try {
            $feature = Feature::whereId($feature_id)->first();
            if (!$feature){
                abort(404);
            }

            Feature::whereId($feature->id)->update([
                'key' => $request->key,
                'value' => $request->value,
            ]);

            return redirect(route('features.edit',$feature->id))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('features.edit',$feature->id))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method


    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($feature_id)
    {
        try {
            $feature = Feature::whereId($feature_id)->first();
            if (!$feature){
                abort(404);
            }
            $feature->delete();
            return redirect(route('features.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
        }catch (\Exception $e){
            return redirect(route('features.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method


}// end class
