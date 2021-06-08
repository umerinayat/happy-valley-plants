<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
            'name' => [
                'required',
                'string',
                Rule::unique('categories', 'name')->ignore($this->category)
            ],
            'slug' => [
                'required',
                Rule::unique('categories', 'slug')->ignore($this->category),
                'regex:/^[a-zA-Z0-9\s-]+$/'
            ]
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
            'name.required' => 'Category name is required.',
            'name.string' => 'Category name must be a string.',
            'name.unique'  => $this->name .' category has already been taken.',
            'slug.required'  => 'Slug is required.',
            'slug.unique'  => $this->slug. ' Slug has already been taken.',
            'slug.regex'  => 'Slug must not have any special characters.',
        ];
    }
}
