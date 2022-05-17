<?php

namespace Modules\Task\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|max:255',
            'user_to'       => 'required',
            'status'        => 'required|string',
            'date_from'     => 'required|date',
            'date_to'       => 'required|date',
            'description'   => 'required|string|max:500',
            'board_id'      => 'required',
            'comment'       => '',
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
