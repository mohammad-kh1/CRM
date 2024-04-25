<?php

namespace Modules\Users\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "first_name" => ["required","min:3","max:60","string"],
            "last_name" => ["required","min:3","max:60","string"],
            "email" => ["required","email","unique:users,email"],
            "address" => ["required","string","min:10","max:512","string"],
            "phone_number" => ["required","min:7","max:20"],
            "password" => ["required","min:7"],
            "confirm_password" => ["required","min:7","same:password"]
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
