<?php

namespace Modules\Clients\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "name" => ["required","string","min:3","max:60"],
            "company_name" => ["required","string","min:3","max:60"],
            "email" => ["required","string","email"],
            "city" => ["required","string","min:2","max:60"],
            "address" => ["required","string"],
            "phone_number" => ["required","string"],
            "zip" => ["required","integer"],
            "vat" => ["required","integer"],

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
