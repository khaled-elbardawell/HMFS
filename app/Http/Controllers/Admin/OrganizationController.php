<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrganiztionRequest;
use App\Models\Admin\Organization;
use App\Models\Admin\UserOrganization;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Modules\Role\Entities\Role;


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
        try{
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
        }catch (\Exception $e){
             return redirect(route('organization.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }

    }// end method




    /**
     * Show the form for editing the specified resource.
     *
     * @param Organization $organization
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($organization_id)
    {
        $organization = Organization::sqlFirst("SELECT users.name,users.email,users.bio,users.phone,organizations.id,organizations.name as organization_name,organizations.description,organizations.country,organizations.city,
                                                          organizations.street,organizations.postal_code,organizations.status as organization_status,user_roles.user_id,user_roles.role_id,uploads.uploadable_id,uploads.file,user_organizations.status FROM organizations
                                                          INNER JOIN users ON users.id = organizations.owner_id
                                                          INNER JOIN user_roles ON user_roles.user_id = users.id
                                                          INNER JOIN  uploads ON uploads.uploadable_id=organizations.id AND uploads.uploadable_type='App\\\Models\\\Admin\\\Organization'
                                                          INNER JOIN user_organizations ON user_organizations.organization_id = organizations.id AND users.id = user_organizations.user_id
                                                          WHERE organizations.id = ?",[$organization_id]);


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
            $user = ["name" => $request->name,"phone" => $request->phone,"bio" => $request->bio,];
            if ($request->has('password')){ $user["password" ] = bcrypt($request->password);}

          User::whereId($organization->owner_id)->update($user);

           Organization::whereId($organization->id)->update([
                'name' => $request->organization_name,'description'=> $request->description,'country' => $request->country,
                'city'=> $request->city,'street'=> $request->street,'postal_code' => $request->postal_code,
                'status'=> $request->has('organization_status') ? 1 : 0,
            ]);

            Organization::saveUpload($organization->id,'update','image','en','logo');

            UserOrganization::where('user_id',$organization->owner_id)
                            ->where('organization_id',$organization->id)
                            ->update(["status" => $request->has('status') ? 1 : 0,]);

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
    public function destroy(Organization $organization)
    {
        try {
            $organization->delete();
            UserOrganization::where('user_id',$organization->owner_id)->where('organization_id',$organization->id)->delete();
            Organization::deleteUpload($organization->id);
            Role::where('organization_id',$organization->id)->delete();
            return redirect(route('organization.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
        }catch (\Exception $e){
            return redirect(route('organization.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method


    /**
     * Super Admin Preview Organization as Admin In Organization
     *
     * @param Organization $organization
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function preview(Organization $organization){
        session()->put('organization_id',$organization->id);
        return redirect(url('home'));
    }


    /**
     * Preview As Super Admin
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function superAdminPreview(){
        if(Gate::allows('is_super_admin') && session()->has('organization_id')){
            session()->forget('organization_id');
            return redirect(url('home'));
        }
        abort(404);
    }


}// end class
