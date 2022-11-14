<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mobile' => [
                "required",
                "numeric",
                Rule::unique('users')->ignore($this->route('user'), 'mobile')
            ],
            'password' => 'nullable|string|min:1',
            'role' => 'required|in:admin,manager,user',
        ];
    }
}
