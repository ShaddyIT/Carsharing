<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
/**
*   @OA\Schema(
*      schema="UserRequest",
*      required={"surname", "name", "patronymic", "email", "password"},
*      
*      @OA\Property(property="surname", type="string", description="Фамилия пользователя"),
*      @OA\Property(property="name", type="string", description="Имя"),
*      @OA\Property(property="patronymic", type="string", description="Отчество"),
*      @OA\Property(property="email", type="string", format="email", description="email"),
*      @OA\Property(property="password", type="integer", format="AlphaNumeric", description="пароль"),
*     
*   
* )
*/



class UserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'surname'=>'required|string|max:255',
            'name'=>'required|string|max:255',
            'patronymic'=>'required|string|max:255',
            'email'=>'required|email:rfc|max:255|unique:users,email',
            'password' => 'required|alpha_num',
            'user_status_id' => 'integer'
        ];


        
    }
}
