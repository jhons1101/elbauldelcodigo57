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
            'txtSlugPost'  => 'required|min:20|max:200',
            'txtTagsPost'  => 'required|numeric',
            'txtKeyPost'   => 'required|min:5|max:300',
            'txtDesPost'   => 'required|min:20|max:200',
            'txtUsuPost'   => 'required|numeric',
            'textareaPost' => 'required|min:5',
            'textareaCode' => 'required|min:20',
            'txtTipPost'   => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'txtTitPost'    => 'título del post',
            'txtTemPost'    => 'tema del post',
            'txtSlugPost'   => 'slug único del post',
            'txtTagsPost'   => 'tags (etiquetas) del post',
            'txtKeyPost'    => 'key (palabras claves) del post',
            'txtDesPost'    => 'descripción SEO del post',
            'txtUsuPost'    => 'usuario de la sesión',
            'textareaPost'  => 'sección de contenido del post ',
            'textareaCode'  => 'sección del código fuente del post',
            'txtTipPost'    => 'tipo de post'
        ];
    }
}
