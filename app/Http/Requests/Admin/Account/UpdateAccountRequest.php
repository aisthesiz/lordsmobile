<?php

namespace App\Http\Requests\Admin\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAccountRequest extends FormRequest
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
        $lordAccountId = $this->segment(5);
        return [
            "name"            => "required|min:3|max:255",
            "lord_account_id" => ["required","integer", Rule::unique('accounts', 'lord_account_id')->ignore($lordAccountId, 'id')],
            "time_start"      => "required|date_format:Y/m/d H:i",
            "time_end"        => "required|date_format:Y/m/d H:i",
        ];
    }
}
