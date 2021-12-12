<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
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
            'alm_codigo' => 'required|unique:alm_alumno',
            'alm_nombre' => 'required',
            'alm_edad' => 'required',
            'alm_sexo' => 'required',
            'alm_id_grd' => 'required',
            'alm_observacion' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'unique' => 'El campo :attribute ya se ha regitrado'
        ];
    }

    public function attributes()
    {
        return [
            'alm_codigo' => 'código',
            'alm_nombre' => 'nombre',
            'alm_edad' => 'edad',
            'alm_sexo' => 'sexo',
            'alm_id_grd' => 'grado',
            'alm_observacion' => 'observación',
        ];
    }
}
