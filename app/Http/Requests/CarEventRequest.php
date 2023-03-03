<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarEventRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'car_id' => 'required|integer',
            'event_id' => 'required',
            'fuel' => 'required|numeric|',
            'milleage' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ];
    }
}
