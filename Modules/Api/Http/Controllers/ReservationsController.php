<?php

namespace Modules\Api\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Api\Traits\ApiResponseTrait;
use Modules\Reservations\Entities\Reservation;

class ReservationsController extends Controller
{
    use ApiResponseTrait;



    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserUpcomingReservation()
    {
        $user = auth()->guard('api')->user();
        if (!$user){
            return $this->returnErrorResponse(404,['error' => 'Not Found']);
        }


        $reservations = Reservation::with(['doctor' => function($q){
             $q->select('id','name','email');
        },'user' => function($q){
            $q->select('id','name','email');
        },'organization' => function($q){
            $q->select('id','name');
        }])->where('status',0)
            ->where(function ($q){
                $q->where('reservation_date','=',Carbon::now()->format("Y-m-d"))
                    ->where('reservation_time','>=',Carbon::now()->format("H:i:s"));
            })->orWhere(function ($q){
                $q->where('reservation_date','>=',Carbon::now()->format("Y-m-d"));
            })
            ->where('user_id',$user->id)
            ->get();

        return $this->returnDataResponse($reservations);

    }// end method



    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserPreviousReservation()
    {
        $user = auth()->guard('api')->user();
        if (!$user){
            return $this->returnErrorResponse(404,['error' => 'Not Found']);
        }


        $reservations = Reservation::with(['doctor' => function($q){
            $q->select('id','name','email');
        },'user' => function($q){
            $q->select('id','name','email');
        },'organization' => function($q){
            $q->select('id','name');
        }])->where('status',1)
            ->where(function ($q){
                $q->where('reservation_date','=',Carbon::now()->format("Y-m-d"))
                    ->where('reservation_time','<',Carbon::now()->format("H:i:s"));
            })->orWhere(function ($q){
                $q->where('reservation_date','<',Carbon::now()->format("Y-m-d"));
            })
            ->where('user_id',$user->id)
            ->get();


        return $this->returnDataResponse($reservations);
    }// end method



    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserReservation(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'reservation_id'    => "required",
        ]);

        if($validator->fails()){
            return $this->returnValidationErrorResponse($validator,401);
        }


        $user = auth()->guard('api')->user();
        if (!$user){
            return $this->returnErrorResponse(404,['error' => 'Not Found']);
        }

        $reservation = Reservation::with(['doctor' => function($q){
            $q->select('id','name','email');
        },'user' => function($q){
            $q->select('id','name','email');
        },'organization' => function($q){
            $q->select('id','name');
        }])->where('user_id',$user->id)
           ->where('id',$request->reservation_id)
           ->first();

        if (!$reservation){
            return $this->returnErrorResponse(404,['error' => 'Not Found']);
        }
        return $this->returnDataResponse($reservation);

    }// end method




}
