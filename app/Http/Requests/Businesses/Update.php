<?php

namespace App\Http\Requests\Businesses;

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
        return auth()->user()->can('update', $this->route('business'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() 
    {
        return [
			'user_id' => 'nullable|exists:users,id|numeric',
			'name' => 'required|max:255',
			'slug' => 'required|max:255',
			'logo_id' => 'nullable|numeric',
			'address_id' => 'nullable|numeric',
			'website' => 'nullable|max:255',
			'video_link' => 'nullable|max:255',
			'description' => 'nullable|string',
			'general_phone' => 'nullable|max:20',
			'business_phone' => 'nullable|max:20',
			'email' => 'nullable|max:255',
			'rating' => 'required',
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
