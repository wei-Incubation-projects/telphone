<?php

namespace App\Http\Requests\Back\Member;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'leader_id' => 'required|integer',
            'type'  => 'required|integer',
            'username' => 'required|string|max:20',
            'password'  => 'nullable|string|min:6,max:64',
            'phone' => 'nullable|string',
            'email'  => 'nullable|string|min:4,max:64',
            'status'   => 'required|integer',
            'callback' => 'nullable|integer',
        ];
    }
}
