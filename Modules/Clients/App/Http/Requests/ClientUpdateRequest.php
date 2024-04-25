<?php

namespace Modules\Clients\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "name" => ["nullable","string","min:3","max:60"],
            "company_name" => ["nullable","string","min:3","max:60"],
            "email" => ["nullable","string","email"],
            "city" => ["nullable","string","min:2","max:60"],
            "address" => ["nullable","string"],
            "phone_number" => ["nullable","string"],
            "zip" => ["nullable","integer"],
            "vat" => ["nullable","integer"],

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
