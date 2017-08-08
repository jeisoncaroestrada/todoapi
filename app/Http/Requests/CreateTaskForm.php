<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateTaskForm extends FormRequest
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
            'name' => 'required|min:3',
            'priority' => 'required',
            'due_date' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor ingrese su direccion de correo electronico',
            'name.min' => 'El nombre de la tarea debe tener minimo 3 caracteres alfanuméricos',
            'priority.required' => 'Por favor ingrese la prioridad de la tarea',
            'due_date.required' => 'Por favor ingrese la fecha de vencimiento',
        ];
    }
}
