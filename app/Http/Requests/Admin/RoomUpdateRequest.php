<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoomUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'package_id' => 'required|exists:packages,p_id',
            'detail' => 'nullable',
            'description' => 'nullable',
            'room_number' => 'required',
        ];
    }
}
