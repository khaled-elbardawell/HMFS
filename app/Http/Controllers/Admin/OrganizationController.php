<?php

namespace App\Http\Controllers\Admin;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrganiztionRequest;
use App\Models\Admin\Organization;
use App\Models\Admin\UserOrganization;
use App\User;
use Illuminate\Http\Request;
use Modules\Role\Entities\Permission;
use Modules\Role\Entities\Role;
use Modules\Role\Entities\RolePermissions;
use Modules\Role\Entities\UserRoles;

class OrganizationController extends Controller
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
        $organizations = Organization::page();
        $start_counter = Organization::getStartCounter();
        return view('admin.organization.index',compact('organizations','start_counter'));
    }// end method

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.organization.create');
    }// end method




    /**
     * Store a newly created resource in storage.
     *
     * @param OrganiztionRequest $request
     */
    public function store(OrganiztionRequest $request)
    {
//        try{
          $owner = User::create([
              "email" => $request->email,"name" => $request->name,"phone" => $request->phone,
              "password"  => bcrypt($request->password),"bio" => $request->bio,
              ]);

           $organization = Organization::create([
               'name' => $request->organization_name,'description'=> $request->description,'country' => $request->country,
               'city'=> $request->city,'street'=> $request->street,'postal_code' => $request->postal_code,
               'owner_id' => $owner->id, 'status'=> $request->has('organization_status') ? 1 : 0,
           ]);

          Organization::saveUpload($organization->id,'create','image','en','logo');
          Organization::AssignOwnerToOrganizationWithRoles($request,$owner,$organization);

          return redirect(route('organization.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
//        }catch (\Exception $e){
//             return redirect(route('organization.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
//        }

    }// end method




    /**
     * Show the form for editing the specified resource.
     *
     * @param Organization $organization
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Organization $organization)
    {
        return view('admin.organization.edit',compact('organization'));
    }// end method



    /**
     * Update the specified resource in storage.
     *
     * @param OrganiztionRequest $request
     * @param Organization $organization
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(OrganiztionRequest $request,Organization $organization)
    {
        try {
            $organization->update([
                'name'        => $request->name,
                'description' => $request->description,
                'status'      => $request->has('status') ? 1 : 0,
            ]);

            return redirect(route('organization.edit',$organization->id))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('organization.edit',$organization->id))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method



    /**
     *  Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            Organization::whereId($id)->delete();
            return redirect(route('organization.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
        }catch (\Exception $e){
            return redirect(route('organization.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method
}// end class
