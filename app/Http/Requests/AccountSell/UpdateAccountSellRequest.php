<?php

namespace App\Http\Requests\AccountSell;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountSellRequest extends FormRequest
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
        return [
            "title" => "required|min:3|max:255",
            "might" => "required|integer",
            "stats_bow" => "required|integer",
            "stats_horse" => "required|integer",
            "stats_sword" => "required|integer",
            "heroes_payed" => "nullable|integer",
            "artifacts" => "nullable|integer",
            "skins" => "nullable|integer",
            "troops" => "nullable|integer",
            "value_sell" => "nullable|numeric",
            "value_discount" => "nullable|numeric",
            "value_sold" => "nullable|numeric",
            "value_fee" => "nullable|numeric",
            "elite_store" => "required|boolean",
            "is_verified" => "required|boolean",
            "is_active" => "required|boolean",
            "description" => "nullable",
            "image_1" => "nullable|image",
            "image_2" => "nullable|image",
            "image_3" => "nullable|image",
            "image_4" => "nullable|image",
            "image_5" => "nullable|image",
            "image_6" => "nullable|image"
        ];
    }
}
