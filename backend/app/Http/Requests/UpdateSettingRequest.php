<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->role === 'admin';
    }

    public function rules(): array
    {
        $id = $this->route('setting');

        return [
            'key' => 'sometimes|string|max:255|unique:settings,key,' . $id,
            'value' => 'sometimes|string',
            'group' => 'nullable|string|max:100',
            'type' => 'nullable|string|max:50',
        ];
    }
}
