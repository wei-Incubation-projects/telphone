<?php

namespace App\Http\Requests\Back\Phone;

use Illuminate\Foundation\Http\FormRequest;

class PhoneUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        return [
            //
            'id' => 'required|integer',
            'phone' => 'required|string|max:64',
            'status'   => 'required|integer',
            'batch'   => 'nullable|integer',
        ];
    }
}
