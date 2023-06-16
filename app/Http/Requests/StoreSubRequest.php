<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'amount' => ['required', 'integer', 'min:0', 'max:100000'],
            'points' => ['required', 'integer', 'min:0', 'max:100000'],
            'rang' => ['required', 'integer', 'min:0', 'max:10'],
        ];
    }
}
