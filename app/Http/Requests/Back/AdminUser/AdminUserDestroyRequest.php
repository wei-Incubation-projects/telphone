<?php

namespace App\Http\Requests\Back\AdminUser;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if($this->request->get('id') == 1){
            return false;
        }
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
            'ids' => 'required|array',
        ];
    }
}
