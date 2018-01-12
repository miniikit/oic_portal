<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MypageRequest extends FormRequest
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
            profile_image => 'max:3000|mimes:jpg,jpeg',
            profile_name => 'max:50',
            profile_url => 'url',
            profile_introduction => 'max:200',
        ];
    }
}
