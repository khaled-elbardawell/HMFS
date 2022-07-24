<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfferRequest;
use App\Models\Admin\Feature;
use App\Models\Admin\offer;
use App\Models\Admin\OfferFeatures;
use Carbon\Carbon;

class OfferController extends Controller
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
        $offers = Offer::page();
        $start_counter = Offer::getStartCounter();
        return view('admin.Offers.index',compact('offers','start_counter'));
    }// end method


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $features = Feature::get();
        return view('admin.Offers.create',compact('features'));
    }// end method


    /**
     * Store a newly created resource in storage.
     *
     * @param offerRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(OfferRequest $request)
    {

        try{
            $offer = Offer::create([
                'name' => $request->name,
                'description'=> $request->description,
            ]);

            if(!is_null($request->features)){
                foreach($request->features as $key => $value){
                    OfferFeatures::create([
                        'offer_id' => $offer->id,
                        'feature_id' => $value,
                        'user_id' => auth()->user()->id,
                    ]);
                }
            }


          return redirect(route('offers.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
             return redirect(route('offers.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }

    }// end method

    /**
     * Show the form for editing the specified resource.
     *
     * @param offer $offer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($offer_id)
    {
        $features = Feature::get();
        $offer_features = OfferFeatures::where('offer_id',$offer_id)->get();
        $offer = Offer::whereId($offer_id)->first();
        if (!$offer){
            abort(404);
        }
        return view('admin.Offers.edit',compact('offer','features','offer_features'));
    }// end method

    /**
     *  Update the specified resource in storage.
     *
     * @param offer $request
     * @param  $offer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(OfferRequest $request,$offer_id)
    {
        // dd($offer_id);
        try {
            $offer = Offer::whereId($offer_id)->first();
            if (!$offer){
                abort(404);
            }

            Offer::whereId($offer->id)->update([
                'name' => $request->name,
                'description'=> $request->description,
            ]);

            if(!is_null($request->features)){
                foreach($request->features as $key => $value){
                    OfferFeatures::where('offer_id',$offer_id)->sync(
                        [
                            'offer_id' => $offer_id,
                            'feature_id' => $value,
                        ],[
                            'offer_id' => $offer_id,
                            'feature_id' => $value,
                            'user_id' => auth()->user()->id,
                        ]
                    );
                }
            }
            return redirect(route('offers.edit',$offer->id))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('offers.edit',$offer->id))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method


    /**
     * Remove the specified resource from storage.
     *
     * @param offer $offer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($offer_id)
    {
        try {
            $offer = Offer::whereId($offer_id)->first();
            if (!$offer){
                abort(404);
            }
            $offer->delete();
            return redirect(route('offers.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
        }catch (\Exception $e){
            return redirect(route('offers.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method


}// end class
