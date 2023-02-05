<?php

namespace App\Http\Requests\Api\Car;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'brand' => ['required', 'min:1', 'max:100'],
            'model' => ['required', 'min:1', 'max:100'],
            'year' => ['required', 'integer', 'digits:4'],
            'body_type' => ['required', 'min:1', 'max:100'],
            'volume' => ['required', 'numeric'],
            'transmission' => ['required', 'min:1', 'max:100'],
        ];
    }
}
