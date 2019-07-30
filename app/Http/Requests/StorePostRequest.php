<?php

namespace elbauldelcodigo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'txtTitPost'   => 'required|min:20|max:200',
            'txtTemPost'   => 'required|numeric',
            'txtTagsPost'  => 'required|array',
            'txtKeyPost'   => 'required|min:5|max:300',
            'txtDesPost'   => 'required|min:20|max:200',
            'textareaPost' => 'required|min:5',
            'textareaCode' => 'required|min:20',
            'txtTipPost'   => 'required|numeric',
            'txtSlugPost'  => 'required'
        ];
    }
}
