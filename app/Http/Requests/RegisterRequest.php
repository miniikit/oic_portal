<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required|max:50',
            'name_kana' => 'required|max:100',
            'profile_image' => 'max:3000|mimes:jpg,jpeg',
            'profile_name' => 'required|max:50',
            'profile_admission_year' => 'date',
            'profile_url' => 'url',
            'profile_introduction' => 'max:200',
        ];
    }
}
