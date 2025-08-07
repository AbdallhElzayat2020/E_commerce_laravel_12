<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $admin_id = $this->route('admin');
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'status' => ['sometimes', 'required', 'in:active,inactive'],
            'role_id' => ['required', 'exists:roles,id'],
        ];

        if ($isUpdate && $admin_id) {
            $rules['email'] = [
                'required',
                'email',
                'max:150',
                Rule::unique('admins', 'email')->ignore($admin_id)
            ];
        } else {
            $rules['email'] = ['required', 'email', 'max:150', 'unique:admins,email'];
        }

        if ($isUpdate) {
            $rules['password'] = ['nullable', 'string', 'min:8', 'confirmed', 'max:50'];
        } else {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed', 'max:50'];
        }

        return $rules;
    }

}
