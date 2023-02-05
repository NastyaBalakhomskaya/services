<?php

namespace App\Http\Requests\Api\Order;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'title' => ['required', 'min:1', 'max:100'],
            'contact_details' => ['required', 'min:1', 'max:100'],
            'date_start' => ['required', 'string'],
            'time_start' => ['required', 'string'],
            'text' => ['required', 'min:1'],
            'status' => ['required', 'max:100'],
            'datetime_finish' => ['string'],
            'price_sum' => ['numeric'],
            'detailings' => ['required', 'array', 'min:1'],
            'detailings.*' => ['required', 'exists:detailings,id'],
            'services' => ['required', 'array', 'min:1'],
            'services.*' => ['required', 'exists:services,id'],
            'tires' => ['required', 'array', 'min:1'],
            'tires.*' => ['required', 'exists:tires,id'],
            'cars' => ['required', 'array', 'min:1'],
            'cars.*' => ['required', 'exists:cars,id'],
        ];
    }
}
