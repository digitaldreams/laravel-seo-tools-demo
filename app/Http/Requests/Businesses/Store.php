<?php

namespace App\Http\Requests\Businesses;

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
        return auth()->user()->can('create', \App\Models\Business::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'website' => 'nullable|url|max:255',
            'video_link' => 'nullable|max:255',
            'description' => 'nullable|string',
            'general_phone' => 'nullable|max:20',
            'business_phone' => 'nullable|max:20',
            'email' => 'nullable|email|max:255',
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
