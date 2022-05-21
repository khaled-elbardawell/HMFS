<?php

namespace App\Http\Requests\Admin;

use App\Rules\UserEmailRule;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class OrganiztionRequest extends FormRequest
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
            'organization_name' => 'required|string|max:255',
            'description'       => 'nullable|string|max:2000',
            'country'           => 'required|string|max:100',
            'city'              => 'required|string|max:100',
            'street'            => 'required|string|max:100',
            'postal_code'       => 'required|string|max:100',
            'logo'              => $this->validateLogo(),

            'email'             => 'required|email|max:255|unique:users,email',
            'name'              => 'required|string|max:100',
            'bio'               => 'nullable|string|max:2000',
            'phone'             => 'nullable|numeric|digits_between:5,15',
            'password'          =>  $this->validatePassword()
        ];
    }


    private function validatePassword(){
        if ($this->method() == "POST"){
            return 'required|string|min:8|confirmed';
        }
        return 'nullable|string|min:8|confirmed';
    }// end method

    private function validateLogo(){
        if ($this->method() == "POST"){
            return 'required|file|mimes:jpg,png,jpeg|max:204800|dimensions:max_width=100,max_height=20';
        }
        return 'nullable|file|mimes:jpg,png,jpeg|max:204800|dimensions:max_width=100,max_height=20';
    }// end method

}
