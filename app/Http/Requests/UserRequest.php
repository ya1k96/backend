<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

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
    public function rules()
    {
        return [
             "name" => "required|string|max:255",
             "email" => "required|email|max:255|unique:users",
             "password" => "required|string|min:8"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe tener un tipo string',
            'name.max' => 'El nombre no debe contener mas de 255 caracteres',

            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es valido',
            'email.max' => 'El email no debe contener mas de 255 caracteres',
            'email.unique' => 'Este correo se encuentra en uso',

            'password.required' => 'Ingresa una contraseña',
            'password.string' => 'La contraseña debe tener un tipo string',
            'password.min' => 'La contraseña debe tener un minimo de 8 caracteres'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
