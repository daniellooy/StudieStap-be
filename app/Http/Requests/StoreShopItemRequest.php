<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopItemRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=> ['required', 'string', 'min:1', 'max:50'],
            'description'=> ['required', 'string', 'min:1', 'max:500'],
            'price'=> ['required', 'integer', 'min:0', 'max:10000'],
        ];
    }
}
