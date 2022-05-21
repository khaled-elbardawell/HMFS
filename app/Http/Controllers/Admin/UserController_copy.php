<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrganiztionRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Admin\Organization;
use App\Models\Admin\UserOrganization;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Role\Entities\Role;
use Modules\Role\Entities\UserRoles;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = UserOrganization::getUsersOrganizationDB(request()->organization_id);
        $start_counter = User::getStartCounter();
        return view('admin.users.index',compact('users','start_counter'));
    }// end method

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::where('organization_id',\request()->organization_id)->get();
        return view('admin.users.create',compact('roles'));
    }// end method




    /**
     * Store a newly created resource in storage.
     *
     * @param OrganiztionRequest $request
     */
    public function store(UserRequest $request)
    {
        try{
            $user = User::where('email',$request->email)->first();
            if (!$user){
                $user = User::create(['email' => $request->email,'password' =>  bcrypt($request->password)]);
            }

            UserOrganization::create([
                'organization_id' => $request->organization_id,
                'name'            => $request->name,
                'user_id'         => $user->id,
                'phone'           => $request->phone,
                'bio'             => $request->bio,
                'registered_at'   => Carbon::now(),
                'status'          => $request->has('status') ? 1 : 0,
            ]);

            UserRoles::create(['user_id' => $user->id,'role_id' => $request->role_id]);

            return redirect(route('users.index',['organization_id' => \request()->organization_id]))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
            return redirect(route('users.index',['organization_id' => \request()->organization_id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }

    }// end method




    /**
     * Show the form for editing the specified resource.
     *
     * @param Organization $organization
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $user = UserOrganization::getUsersOrganizationDB(\request()->organization_id,$user->id);
        $user_role = UserRoles::getOrganizationUserRole($user->user_id,\request()->organization_id);
        $roles = Role::where('organization_id',\request()->organization_id)->get();
        return view('admin.users.edit',compact('user','roles','user_role'));
    }// end method



    /**
     * Update the specified resource in storage.
     *
     * @param OrganiztionRequest $request
     * @param Organization $organization
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UserRequest $request,User $user)
    {
        try {
            if ($request->password){
                $user->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            UserOrganization::where('user_id',$user->id)->where('organization_id',$request->organization_id)->update([
                'name'  => $request->name,
                'phone' => $request->phone,
                'bio'   => $request->bio,
                'status'=> $request->has('status') ? 1 : 0,
            ]);


            UserRoles::updateUserRole($user->id,$request->role_id,$request->organization_id);


            return redirect(route('users.edit',[$user->id,'organization_id'=>$request->organization_id]))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('users.edit',[$user->id,'organization_id'=>$request->organization_id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method



    /**
     *  Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($user_id)
    {
        try {
            UserOrganization::where('user_id',$user_id)->where('organization_id',\request()->organization_id)->delete();
            UserRoles::deleteUserRole($user_id,request()->organization_id);
            return redirect(route('users.index',['organization_id' => \request()->organization_id]))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
        }catch (\Exception $e){
            return redirect(route('users.index',['organization_id' => \request()->organization_id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }// end method
}// end class
