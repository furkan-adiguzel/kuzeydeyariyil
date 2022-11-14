<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AttenderStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:1',
            'surname' => 'required|min:1',
            'mobile' => 'required|numeric',
            'club' => 'required',
            'position' => 'nullable',
            'package_id' => 'required|exists:packages,p_id',
            'user_id' => 'required|exists:users,u_id',
            'identity' => 'required',
            'type' => 'nullable',
            'price' => 'nullable',
            'status' => 'required',
        ];
    }
}
