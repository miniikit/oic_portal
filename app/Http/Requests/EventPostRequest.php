<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventPostRequest extends FormRequest
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
            'event_name' => 'required|string',
            'event_text' => 'required|string',
            'event_image' => 'required|file|mimes:jpg,jpeg|image:jpg,jpeg',
            'event_start_date_time' => 'required',
            'event_end_date_time' => 'required'
        ];
    }
}
