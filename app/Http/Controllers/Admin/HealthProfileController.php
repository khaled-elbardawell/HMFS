<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HealthProfileRequest;
use App\Models\Admin\UserOrganization;
use App\Models\Admin\HealthProfile;
use Illuminate\Http\Request;

class HealthProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:users.health-profile');
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
       public function index()
       {
           $userOrganization = UserOrganization::where('user_id',request()->user_id)->where('organization_id',session('organization_id'))->first();
           if(!$userOrganization){ abort(404); }

           $healthProfile = HealthProfile::with(['doctor','user'])->where('user_id',\request()->user_id)->page();
           $start_counter = HealthProfile::getStartCounter();
           return view('admin.HealthProfile.index',compact('healthProfile','start_counter'));
       }// end method


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $userOrganization = UserOrganization::with(['user'])->where('user_id',request()->user_id)->where('organization_id',session('organization_id'))->first();
        if(!$userOrganization){ abort(404); }


        // get doctors
        $sql = "SELECT users.id,users.email,users.name FROM user_organizations
                INNER JOIN users ON users.id = user_organizations.user_id
                INNER JOIN user_roles ON users.id = user_roles.user_id
                INNER JOIN roles ON roles.id = user_roles.role_id
                WHERE user_organizations.organization_id = ? AND roles.role_type_id = 3";
        $doctors = UserOrganization::sqlGet($sql,[session()->get('organization_id')]);

        return view('admin.HealthProfile.create',compact('doctors','userOrganization'));
    }// end method




    /**
     * @param HealthProfileRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(HealthProfileRequest $request){
        try{
        $userOrganization = UserOrganization::with(['user'])->where('user_id',request()->user_id)->where('organization_id',session('organization_id'))->first();
        if(!$userOrganization){ abort(404); }

        $healthProfile = HealthProfile::create([
                            'title'     	  => $request->title,
                            'description'     => $request->description,
                            'recommendations' => $request->recommendations,
                            'requests'        => $request->requests,
                            'user_id'         => $userOrganization->user->id,
                            'doctor_id'       => $request->doctor_id
                        ]);

       HealthProfile::saveUpload($healthProfile->id,'create','file','en','attachments');

            return redirect(route('health-profile.index',['user_id' => $userOrganization->user->id]))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
            return redirect(route('health-profile.index',['user_id' => $userOrganization->user->id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method





    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $userOrganization = UserOrganization::with(['user'])->where('user_id',request()->user_id)->where('organization_id',session('organization_id'))->first();
        if(!$userOrganization){ abort(404); }

        $healthProfile = HealthProfile::whereId($id)->first();

        // get doctors
        $sql = "SELECT users.id,users.email,users.name FROM user_organizations
                INNER JOIN users ON users.id = user_organizations.user_id
                INNER JOIN user_roles ON users.id = user_roles.user_id
                INNER JOIN roles ON roles.id = user_roles.role_id
                WHERE user_organizations.organization_id = ? AND roles.role_type_id = 3";
        $doctors = UserOrganization::sqlGet($sql,[session()->get('organization_id')]);

        return view('admin.HealthProfile.edit',compact('doctors','userOrganization','healthProfile'));
    }// end method



    /**
     * Update the specified resource in storage.
     * @param HealthProfileRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function update(HealthProfileRequest $request, $id)
    {
        try{
            $userOrganization = UserOrganization::with(['user'])->where('user_id',$request->user_id)->where('organization_id',session('organization_id'))->first();
            if(!$userOrganization){ abort(404); }

            $healthProfile = HealthProfile::whereId($id)->where('user_id',$request->user_id)->first();
            if(!$healthProfile){ abort(404); }


            $healthProfile->update([
                'title'     	  => $request->title,
                'description'     => $request->description,
                'recommendations' => $request->recommendations,
                'requests'        => $request->requests,
                'doctor_id'       => $request->doctor_id
            ]);

            HealthProfile::saveUpload($healthProfile->id,'update','file','en','attachments');

            return redirect(route('health-profile.edit',[$id,'user_id' => $request->user_id]))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('health-profile.edit',[$id,'user_id' => $request->user_id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method




    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $userOrganization = UserOrganization::with(['user'])->where('user_id',request()->user_id)->where('organization_id',session('organization_id'))->first();
            if(!$userOrganization){ abort(404); }

            $healthProfile = HealthProfile::whereId($id)->where("user_id",\request()->user_id)->first();
            $healthProfile->delete();

            HealthProfile::deleteUpload($healthProfile->id,'file','en');


            return redirect(route('health-profile.index',['user_id' => $userOrganization->user->id]))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
        }catch (\Exception $e){
            return redirect(route('health-profile.index',['user_id' => $userOrganization->user->id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method

}
