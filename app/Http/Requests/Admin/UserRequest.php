<?php

namespace App\Http\Requests\Admin;

use App\Rules\UserEmailRule;
use App\User;
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
        $rules['role_id'] = $this->validateRoleId();
        $rules['organization_id'] = 'required|exists:organizations,id';

        if($this->method() == "POST"){
            $rules['email'] = [new UserEmailRule($this->organization_id)];
            $user = User::where('email',$this->email)->first();
            if(!$user){
                $rules['password'] = $this->validatePassword();
                $rules['name']  = 'required|string|max:100';
                $rules['bio']   = 'nullable|string|max:2000';
                $rules['phone'] = 'nullable|numeric|digits_between:5,15';
            }
        }


        return $rules;
    }

    private function validateRoleId(){
        return ['required','not_in:1',
            Rule::exists('roles','id')
                ->where('organization_id',$this->organization_id)
        ];
    }// end method


    private function validatePassword(){
        if ($this->method() == "POST"){
            return 'required|string|min:8|confirmed';
        }
        return 'nullable|string|min:8|confirmed';
    }// end method


}
