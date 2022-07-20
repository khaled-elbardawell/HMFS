<?php

namespace Modules\Api\Http\Controllers;

use App\Models\Admin\HealthProfile;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Api\Traits\ApiResponseTrait;

class HealthProfileController extends Controller
{
    use ApiResponseTrait;

    public function getListUserHealthProfile()
    {
        $user = auth()->guard('api')->user();
        $userHealthProfiles = HealthProfile::select('id','title','description','recommendations','requests','doctor_id','created_at')
            ->with(['doctor' => function($q){
                $q->select('id','name','email')->with(['upload' => function($q){
                    $q->select('id','file','uploadable_type','uploadable_id');
                }]);
            },'upload' => function($q){
                $q->select('id','file','uploadable_type','uploadable_id');
            }])->where('user_id',$user->id)->orderBy('id','DESC')->get();
        return $this->returnDataResponse($userHealthProfiles);
    } // end method

    public function getUserHealthProfile(){
        $validator = Validator::make(\request()->all(),[
            'health_profile_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->returnValidationErrorResponse($validator,401);
        }


        $user = auth()->guard('api')->user();
        $userHealthProfiles = HealthProfile::select('id','title','description','recommendations','requests','doctor_id','created_at')
            ->with(['doctor' => function($q){
                $q->select('id','name','email')->with(['upload' => function($q){
                    $q->select('id','file','uploadable_type','uploadable_id');
                }]);
            },'upload' => function($q){
                $q->select('id','file','uploadable_type','uploadable_id');
            }])->where('user_id',$user->id)->where('id',\request()->health_profile_id)->first();
        return $this->returnDataResponse($userHealthProfiles);
    }// end method


}
