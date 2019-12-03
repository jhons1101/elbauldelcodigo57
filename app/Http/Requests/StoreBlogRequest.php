<?php

namespace elbauldelcodigo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'txtTitblog'   => 'required|min:10|max:100',
            'txtTagsBlog'  => 'required|array',
            'textareaBlog' => 'required|min:300',
            'txtKeyblog'   => 'required|min:10|max:200',
            'txtDescblog'  => 'required|min:10|max:200',
            'imageBlog'    => 'required|image',
            'txtPubBlog'   => 'required'
        ];
    }
}
