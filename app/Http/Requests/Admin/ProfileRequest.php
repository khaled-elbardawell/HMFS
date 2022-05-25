<?php

namespace App\Http\Requests\Admin;

use App\Rules\UserEmailRule;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'image_profile' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:204800|dimensions:max_width=100,max_height=20',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'min:8|max:15|nullable',
            'confirm__password' => 'same:password|min:8|max:15|nullable',
            'phone' => 'string|min:5|max:500|nullable',
            'bio' => 'string|min:5|max:500|nullable',
        ];
    }


}
