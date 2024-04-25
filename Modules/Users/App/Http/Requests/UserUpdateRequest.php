<?php

namespace Modules\Users\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "first_name" => ["nullable","min:3","max:60","string"],
            "last_name" => ["nullable","min:3","max:60","string"],
            "email" => ["nullable","email",Rule::unique("users")->ignore($this->user)],
            "address" => ["nullable","string","min:10","max:512","string"],
            "phone_number" => ["nullable","min:7","max:20"],
            "password" => ["nullable","min:7"],
            "confirm_password" => ["nullable","min:7","same:password"]
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
