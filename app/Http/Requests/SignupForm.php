<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupForm extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required|confirmed',
            'password_confirmation' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Por favor ingrese su direccion de correo electronico',
            'email.email' => 'Por favor ingrese una direccion de correo valida',
            'email.unique' => 'Ya existe una cuenta creada con esta direccion de correo',
            'password.required' => 'Por favor ingrese la contraseña',
            'password.min' => 'La contraseña debe tener minimo 6 caracteres alfanuméricos',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password_confirmation.required' => 'Por favor repita la contraseña',
        ];
    }
}
