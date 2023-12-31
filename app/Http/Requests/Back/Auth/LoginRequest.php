<?php

namespace App\Http\Requests\Back\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'account'  => 'required|string|min:4,max:64',
            'password'  => 'required|string|min:6,max:64',
        ];
    }
}
