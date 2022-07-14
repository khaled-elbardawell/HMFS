<?php

namespace App\Http\Requests\Admin;

use App\Rules\UserEmailRule;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class HealthProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'             =>  'required|string|max:255',
            'description'       =>  'required|string|max:10000',
            'requests'          =>  'nullable|string|max:10000',
            'recommendations'   =>  'nullable|string|max:10000',
            'attachments'       =>  'nullable',
            'attachments.*'     =>  'file|mimes:jpg,png,jpeg,pdf,xlsx,docs,txt',
            'user_id'           =>  'required|exists:users,id',
            'doctor_id'         =>  'required|exists:users,id',
        ];
    }

}
