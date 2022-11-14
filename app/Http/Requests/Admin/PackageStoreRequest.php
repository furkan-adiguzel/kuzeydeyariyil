<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PackageStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'required',
            'night' => 'required|numeric',
            'room_person' => 'required|required',
        ];
    }
}
