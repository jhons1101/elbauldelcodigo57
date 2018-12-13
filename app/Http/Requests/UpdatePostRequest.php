<?php

namespace elbauldelcodigo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'txtTitPost' => 'required|min:20|max:21',
            'txtTemPost' => 'required|numeric',
            'txtUsuPost' => 'required|numeric',
            'txtKeyPost' => 'required|max:21'
        ];
    }
}
