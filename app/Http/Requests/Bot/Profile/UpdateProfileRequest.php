<?php

namespace App\Http\Requests\Bot\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $userId = auth()->user()->id;
        return [
            'name' => 'string|min:3|max:255',
            'email' => "email|unique:users,email,{$userId},id",
            'cellphone' => 'nullable|min:8|max:15',
            'password' => 'nullable|min:6|max:12',
            'password_confirmation' => 'required_with:password|same:password',
        ];
    }
}
