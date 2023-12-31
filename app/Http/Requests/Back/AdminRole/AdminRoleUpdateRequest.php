<?php

namespace App\Http\Requests\Back\AdminRole;

use Illuminate\Foundation\Http\FormRequest;

class AdminRoleUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'symbol' => 'required|string',
            'status' => 'required|integer',
            'remark' => 'nullable|string',
            'menus'  => 'nullable|array',
        ];
    }
}
