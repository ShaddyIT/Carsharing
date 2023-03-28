<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FleetOfCarRequest extends FormRequest
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
            'car_model_id' => 'uuid',
            'state_number' => 'alpha_num',
            'vin_number' => 'alpha_num',
            'cost_per_minute' => 'integer',
            'car_status_id' => 'integer',
        ];
    }
}
