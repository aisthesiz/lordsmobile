<?php

namespace App\Http\Requests\Admin\Account;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->user()->can('account.create')) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"            => "required|min:3|max:255",
            "lord_account_id" => "required|integer|unique:accounts,lord_account_id",
            "time_start"      => "required|date_format:Y/m/d H:i",
            "time_end"        => "required|date_format:Y/m/d H:i",
        ];
    }
}
