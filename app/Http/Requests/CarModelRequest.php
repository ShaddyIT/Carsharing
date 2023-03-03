<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarModelRequest extends FormRequest
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
            'car_brand_id' => 'required|integer',
            'car_model' => 'required|alpha_num|max:255',
            'steering_wheel_layout' => 'required|string|max:255',
            'type_of_gearbox' => 'required|string|max:255',
            'car_class' => 'required|string|max:255'
        ];
    }
}
