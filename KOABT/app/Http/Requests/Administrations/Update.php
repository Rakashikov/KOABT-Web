<?php

namespace App\Http\Requests\Administrations;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest 
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
			'position_id' => 'required|exists:administrative_positions,id|numeric',
			'first_name' => 'required|max:50',
			'middle_name' => 'nullable|max:50',
			'last_name' => 'required|max:50',
			'phone' => 'nullable|max:50',
			'e-mail' => 'nullable|max:50',
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
     
        ];
    }

}
