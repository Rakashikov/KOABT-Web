<?php

namespace App\Http\Requests\Rehearsals;

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
			'type_id' => 'required|exists:types_of_rehearsals,id|numeric',
			'troupe_id' => 'required|exists:troupes,id|numeric',
			'actors_ids' => 'required|exists:casts,id|numeric',
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
