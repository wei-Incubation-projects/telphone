<?php

namespace App\Http\Requests\Back\AdminMenu;

use Illuminate\Foundation\Http\FormRequest;

class AdminMenuStoreRequest extends FormRequest
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
            'title' => 'required|string',
            'name' => 'required|string|unique:admin_menus',
            'path' => 'required|string',
            'icon' => 'nullable|string',
            'component' => 'nullable|string',
            'redirect' => 'nullable|string',
            'pid' => 'required|integer',
            'route' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
            'sort' => 'nullable|string',
        ];
    }
}
