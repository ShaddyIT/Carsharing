<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdate extends FormRequest
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
            'surname'=>'string|max:255',
            'name'=>'string|max:255',
            'patronymic'=>'string|max:255',
            'email'=>'email:rfc|max:255|unique:users,email',
            'password' => 'alpha_num',
            'user_status_id' => 'integer'
        ];
    }
}
