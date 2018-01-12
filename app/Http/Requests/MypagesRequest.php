<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MypagesRequest extends FormRequest
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
            'profile_image' => 'file|mimes:jpg,jpeg|image:jpg,jpeg',
            'profile_name' => 'required|string',
            'profile_url' => 'url',
            'profile_introduction' => 'max:400'
        ];
    }
}
