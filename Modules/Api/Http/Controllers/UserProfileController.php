<?php

namespace Modules\Api\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Api\Traits\ApiResponseTrait;

class UserProfileController extends Controller
{
    use ApiResponseTrait;


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserProfileData()
    {
        $user = auth()->guard('api')->user();
        if (!$user){
            return $this->returnErrorResponse(404,['error' => 'Not Found']);
        }

        $user = User::with(['upload'])->where('id',$user->id)->first();
        $image_path = $user->upload ? $user->upload->upload_path = CustomAsset("upload/images/full/{$user->upload->file}") : null;
        if($image_path){
            $user->upload->upload_path = $image_path;
        }
        return $this->returnDataResponse($user);
    }// end method


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserProfileData(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'name'     => "required|string|max:100",
            'bio'      => "nullable|string|max:2000",
            'phone'    => "nullable|numeric|digits_between:5,15",
            'image'    => "nullable|file|mimes:jpg,png,jpeg|max:204800",
        ]);


        if($validator->fails()){
            return $this->returnValidationErrorResponse($validator,401);
        }


        $user = auth()->guard('api')->user();
        if (!$user){
            return $this->returnErrorResponse(404,['error' => 'Not Found']);
        }

         User::where('id',$user->id)->update([
            'name'  => $request->name,
            'bio'   => $request->bio,
            'phone' => $request->phone,
        ]);

        User::saveUpload($user->id,'update','image','en','image');
        return $this->returnSuccessfulResponse('Successful Profile Updated!');
    }// end method
}
