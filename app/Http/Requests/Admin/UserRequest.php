<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules =  [
            'name'            => 'required|string|max:100',
            'bio'             => 'nullable|string|max:2000',
            'phone'           => 'nullable|numeric|digits_between:5,15',
            'organization_id' => 'required|exists:organizations,id',
            'role_id'   => ['required','not_in:1',
                Rule::exists('roles','id')
                    ->where('organization_id',$this->organization_id)
            ],
        ];

//        if ($this->method() == 'POST'){
//            $rules['email'] = "required|email|unique:users,email";
//        }

        return $rules;
    }
}
