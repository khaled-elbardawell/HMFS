<?php

namespace App\Http\Requests\Admin;

use App\Rules\UserEmailRule;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title'         => 'required|string|max:255',
            'excerpt'  => 'required|string|max:1000',
            'description'  => 'required|string|max:2000',
            'logo'  => $this->validateLogo(),
        ];
    }

    private function validateLogo(){
        if ($this->method() == "POST"){
            return 'required|file|mimes:jpg,png,jpeg|max:204800';
        }
        return 'nullable|file|mimes:jpg,png,jpeg|max:204800';
    }// end method

}
