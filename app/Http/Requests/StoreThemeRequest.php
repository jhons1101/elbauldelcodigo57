<?php

namespace elbauldelcodigo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreThemeRequest extends FormRequest
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
            'txtTitTheme'    => 'required|min:2|max:30',
            'txtImgTheme'    => 'required|min:2|max:30',
            'txtTagTheme'    => 'required|min:2|max:30',
        ];
    }
}
