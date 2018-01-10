<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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
            'article_title' => 'required|string',
            'article_text' => 'required|string',
            'article_image' => 'file|mimes:jpg,jpeg|image:jpg,jpeg',
            'article_start_date_time' => 'required'
        ];
    }
}
