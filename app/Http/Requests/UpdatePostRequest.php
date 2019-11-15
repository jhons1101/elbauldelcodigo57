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
            'txtTitPost'   => 'required|min:10|max:200',
            'txtTemPost'   => 'required|numeric',
            'txtSlugPost'  => 'required|min:10|max:200',
            'txtTagsPost'  => 'required|array',
            'txtKeyPost'   => 'required|min:20|max:200',
            'txtDesPost'   => 'required|min:20|max:300',
            'textareaPost' => 'required|min:100',
            'textareaCode' => 'required|min:100',
            'txtTipPost'   => 'required|numeric'
        ];
    }
}
