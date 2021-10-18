<?php

namespace App\Http\Requests\Actors;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest 
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
			'troupe_id' => 'nullable|exists:troupes,id|numeric',
			'position_id' => 'nullable|exists:positions,id|numeric',
			'last_name' => 'required|max:50',
			'first_name' => 'required|max:50',
			'middle_name' => 'nullable|max:50',
			'discription' => 'nullable|string',
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
