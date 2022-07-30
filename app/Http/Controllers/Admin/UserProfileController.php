<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Upload;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id',auth()->id())->with(['upload'])->first();
        return view('user-profile.profile' , compact('user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = User::where('id',auth()->id())->with(['upload'])->first();
        $password = $user->password;

        try{
            if($request->has('confirm__password') && $request->confirm__password){
                $password =  Hash::make($request->confirm__password);
            }

            $user->update([
                'name' => $request->name,
                'bio' => $request->bio,
                'phone' => $request->phone,
                'password' => $password,
            ]);


            User::saveUpload($user->id,'update','image','en','image_profile');


            return redirect(route('profile'))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('profile'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }
}
