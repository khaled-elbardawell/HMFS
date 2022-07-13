<?php

namespace Modules\Reservations\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $date_format = "H:i";
        if(count(explode(':',$this->reservation_time)) == 3){
         $date_format = "H:i:s";
         }
        return [
            'user_id'          => 'required|exists:users,id',
            'doctor_id'        => 'required|exists:users,id',
            'reservation_date' => 'required|date',
            'reservation_time' => "required|date_format:{$date_format}",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
