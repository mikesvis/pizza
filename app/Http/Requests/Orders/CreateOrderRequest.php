<?php

namespace App\Http\Requests\Orders;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'user_currency' => ['required', 'string', 'size:3', Rule::in(['USD', 'EUR'])],
            'comments' => ['max:5000'],
            'ids' => ['required', 'array'],
        ];
    }
}
