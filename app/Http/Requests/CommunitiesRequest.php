<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommunitiesRequest extends FormRequest
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
            'community_title' => 'equired|string|max:255',
            'community_contents' => 'equired|string|max:500',
            'community_image' => 'file|mimes:jpg,jpeg|image:jpg,jpeg',
            'community_category_id' => 'required'
        ];
    }
}
