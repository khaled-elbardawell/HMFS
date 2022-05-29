<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrganiztionRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Admin\Department;
use App\Models\Admin\Organization;
use App\Models\Admin\UserOrganization;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\Role\Entities\Role;
use Modules\Role\Entities\UserRoles;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users.index' , ['only' => ['index']]);
        $this->middleware('can:users.create', ['only' => ['create','store','userCheckEmail']]);
        $this->middleware('can:users.edit'  , ['only' => ['edit','update']]);
        $this->middleware('can:users.delete', ['only' => ['destroy']]);
    }


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
        $departments = Department::where('organization_id',session('organization_id'))->get();
        $roles = Role::where('organization_id',\request()->organization_id)->get();
        return view('admin.users.create',compact('roles','departments'));
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
                $user = User::create([
                    'email'    => $request->email,
                    'password' =>  bcrypt($request->password),
                    'name'     => $request->name,
                    'phone'    => $request->phone,
                    'bio'      => $request->bio,
                ]);
            }

            UserOrganization::create([
                'organization_id' => $request->organization_id,
                'department_id'   => $request->department_id,
                'user_id'         => $user->id,
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
     * Check Email Before Go to Create (AJAX Request)
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userCheckEmail(Request $request){
        $validate = Validator::make($request->all(),['email' => 'required|email|max:255']);
        if ($validate->fails()){
            return response()->json([
                'status' => 'error',
                'message'=> $validate->getMessageBag()->getMessages()['email'][0],
            ]);
        }

        // check Email exists in users table
        $user = User::where('email',$request->email)->first();
        if (!$user){
            return response()->json([
                'status'  => 'success',
                'redirect'=> route("users.create",['organization_id' => $request->organization_id,'email' => $request->email]),
            ]);
        }

        // check Is Email Exists In Organization
        $user = User::sqlFirst("SELECT users.email FROM users
                       INNER JOIN user_organizations ON user_organizations.user_id = users.id
                       WHERE users.email = ? AND user_organizations.organization_id = ?",[$request->email, $request->organization_id]);
        if ($user){
            return response()->json([
                'status' => 'error',
                'message'=> 'The email already exists in this organizations',
            ]);
        }

        //  check Is Email For SuperAdmin
        $user = User::sqlFirst("SELECT users.email FROM users
                       INNER JOIN user_roles ON user_roles.user_id = users.id AND user_roles.user_id = 1
                       WHERE users.email = ?",[$request->email]);
        if ($user){
            return response()->json([
                'status' => 'error',
                'message'=> "The email can't add to this organizations,Choose another email !!",
            ]);
        }

        return response()->json([
            'status'  => 'success',
            'redirect'=> route("users.create",['organization_id' => $request->organization_id,'email' => $request->email,'user_exists' => true]),
        ]);
    }// end method



    /**
     * Show the form for editing the specified resource.
     *
     * @param Organization $organization
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $departments = Department::where('organization_id',session('organization_id'))->get();
        $user = UserOrganization::getUsersOrganizationDB(\request()->organization_id,$user->id);
        $user_role = UserRoles::getOrganizationUserRole($user->id,\request()->organization_id);
        $roles = Role::where('organization_id',\request()->organization_id)->get();
        return view('admin.users.edit',compact('user','roles','user_role','departments'));
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
            UserOrganization::where('user_id',$user->id)->where('organization_id',$request->organization_id)
               ->update(['department_id'   => $request->department_id,'status'=> $request->has('status') ? 1 : 0,]);

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


    public function changeOrganizationPreview($organization_id){
        $userOrganization = UserOrganization::getUsersOrganizationDB($organization_id,auth()->id());
        if (!$userOrganization){
            abort(404);
        }
        session()->put('organization_id',$userOrganization->organization_id);
        return redirect(url('home'));
    }


}// end class
