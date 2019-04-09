<?php

namespace App\Http\Requests\Products;

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
        return auth()->user()->can('update', $this->route('product'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sub_category_id' => 'required|exists:categories,id|numeric',
            'name' => 'required|max:255',
            'description' => 'nullable|string',
            'slug' => 'required|max:255',
            'model' => 'required|max:30',
            'sku' => 'required|max:100',
            'price' => 'required|numeric',
            'brand' => 'nullable|max:100',
            'status' => 'required|in:pending,active,cancelled',
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
