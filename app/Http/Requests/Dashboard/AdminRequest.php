<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = Auth::guard('admin')->user()->id;
        return [
            'name' => ['required', 'min:2', 'max:255', 'string'],
            'email' => ['required', 'email', 'max:255', 'unique:admins,email,' . $id],
            'password' => ['required', 'min:8', 'max:255', 'confirmed'],
            'password_confirmation' => ['required', 'max:255'],
            'role_id' => ['required', 'exists:roles,id'],
            'status' => ['required', 'in:active,inactive'],
        ];
    }
}
