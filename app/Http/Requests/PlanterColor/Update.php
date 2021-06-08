<?php

namespace App\Http\Requests\PlanterColor;

use Illuminate\Foundation\Http\FormRequest;
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
                Rule::unique('planter_colors', 'name')->ignore($this->planter_color)
            ],
            'color_value' => [
                'required',
                'string'
            ]
        ];
    }
}
