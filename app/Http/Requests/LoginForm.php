<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginForm extends FormRequest
{
    /**
     * validación del formulario de LOGIN
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email"    =>    "required|email",
            "password"    =>    "required|min:6"
        ];
    }

    public function messages()
    {
        return [            
            'email.required' => 'Por favor ingrese su direccion de correo electronico',
            'email.email' => 'Por favor ingrese una direccion de correo valida',
            'password.required' => 'Por favor ingrese la contraseña',
            'password.min' => 'La contraseña debe tener minimo 6 caracteres alfanuméricos',
        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}
