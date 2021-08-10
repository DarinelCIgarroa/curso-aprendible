<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
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
        // dd($this->route('project'));
        return [
            'title'         =>  'required',
            'description'   =>  'required|min:8',
            'url'           =>  [
                                'required',
                                Rule::unique('projects')->ignore($this->route('project'))
                                ],

            'category_id'   =>  'required|exists:categories,id', // le pasamos como segundo parametro el id ya que category_id no existe en la base de daatos
            'image' =>  [
                        $this->route('project') ? 'nullable' : 'required',
                        'mimes:jpeg,bmp,png'
                        ],
            ];
    }
    //esta funcion se utiliza para mandar errores personalizados
    public function messages()
    {
        return [
            'category_id.exists:categories,id' => 'La categoria es invalida',
        ];
    }
}
