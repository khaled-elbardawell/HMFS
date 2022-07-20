<?php

namespace Modules\Api\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Api\Traits\ApiResponseTrait;

class UserDoctorController extends Controller
{

    use ApiResponseTrait;



    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserDoctors()
    {
       $sql = "(
                    SELECT
                        dotors_reservations.id,
                        dotors_reservations.name,
                        dotors_reservations.email,
                        dotors_reservations.phone,
                        dotors_reservations.bio,
                        uploads.file
                    FROM
                        reservations
                    INNER JOIN users AS dotors_reservations
                    ON
                        dotors_reservations.id = reservations.doctor_id
                    LEFT JOIN uploads ON uploads.uploadable_id = dotors_reservations.id AND uploads.uploadable_type = 'App\\\User'
                    WHERE
                        reservations.user_id = ?
                )
                UNION
                    (
                    SELECT
                        dotors_health_profiles.id,
                        dotors_health_profiles.name,
                        dotors_health_profiles.email,
                        dotors_health_profiles.phone,
                        dotors_health_profiles.bio,
                        uploads.file
                    FROM
                        health_profiles
                    INNER JOIN users AS dotors_health_profiles
                    ON
                        dotors_health_profiles.id = health_profiles.doctor_id
                    LEFT JOIN uploads ON uploads.uploadable_id = dotors_health_profiles.id AND uploads.uploadable_type = 'App\\\User'
                    WHERE
                        health_profiles.user_id = ?
                )";

        $user = auth()->guard('api')->user();
        $doctors = User::sqlGet($sql,[$user->id,$user->id]);
        return $this->returnDataResponse($doctors,'doctors');
    }// end method


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserDoctor(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'doctor_id'     => "required",
        ]);


        if($validator->fails()){
            return $this->returnValidationErrorResponse($validator,401);
        }


        $sql = "(
                    SELECT
                        dotors_reservations.id,
                        dotors_reservations.name,
                        dotors_reservations.email,
                        dotors_reservations.phone,
                        dotors_reservations.bio,
                        uploads.file
                    FROM
                        reservations
                    INNER JOIN users AS dotors_reservations
                    ON
                        dotors_reservations.id = reservations.doctor_id
                    LEFT JOIN uploads ON uploads.uploadable_id = dotors_reservations.id AND uploads.uploadable_type = 'App\\\User'
                    WHERE
                        reservations.user_id = ? AND reservations.doctor_id = ?
                )
                UNION
                    (
                    SELECT
                        dotors_health_profiles.id,
                        dotors_health_profiles.name,
                        dotors_health_profiles.email,
                        dotors_health_profiles.phone,
                        dotors_health_profiles.bio,
                        uploads.file
                    FROM
                        health_profiles
                    INNER JOIN users AS dotors_health_profiles
                    ON
                        dotors_health_profiles.id = health_profiles.doctor_id
                    LEFT JOIN uploads ON uploads.uploadable_id = dotors_health_profiles.id AND uploads.uploadable_type = 'App\\\User'
                    WHERE
                        health_profiles.user_id = ? AND health_profiles.doctor_id = ?
                )";

        $user = auth()->guard('api')->user();
        $doctor = User::sqlFirst($sql,[$user->id,$request->doctor_id,$user->id,$request->doctor_id]);
        return $this->returnDataResponse($doctor,'doctor');
    }// end method



}
