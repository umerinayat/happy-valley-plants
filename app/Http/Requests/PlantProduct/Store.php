<?php

namespace App\Http\Requests\PlantProduct;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'slug' => 'required|unique:plant_products|regex:/^[a-zA-Z0-9\s-]+$/',
            'description' => 'required|string',
            'selling_price' => 'required|integer'
        ];
    }
}
