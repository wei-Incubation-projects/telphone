<?php

namespace App\Http\Requests\Back\User;

use Illuminate\Foundation\Http\FormRequest;

class UserIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $uri = explode('/',$this->route()->uri());
        return $this->user('admin')->tokenCan(implode(':', array_slice($uri,-3)));
//        return true;
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

        ];
    }
}
