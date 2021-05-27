<?php

namespace App\Http\Requests\API\Front;

use Illuminate\Foundation\Http\FormRequest;

class RedirectUriRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uri' => 'required'
        ];
    }
}
