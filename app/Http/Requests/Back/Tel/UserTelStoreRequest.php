<?php

namespace App\Http\Requests\Back\Tel;

use Illuminate\Foundation\Http\FormRequest;

class UserTelStoreRequest extends FormRequest
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
            'phone' => 'required|string|max:64|unique:tel_phone',
            'callback'   => 'nullable|integer',
            'remark' => 'nullable|string',
            'user_id'  => 'required|integer',
        ];
    }
}
