<?php

namespace App\Http\Requests;

use App\Services\CashService;
use Illuminate\Foundation\Http\FormRequest;

class BalanceUpRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'money' => CashService::moneyInDB($this->money) 
        ]);
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required|uuid',
            'date' => 'required|date',
            'money' => 'required|numeric'
        ];
    }
}
