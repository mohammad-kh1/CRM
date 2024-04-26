<?php

namespace Modules\Projects\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Projects\App\Models\Projects;

class ProjectCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "title"=> ["required","string"],
            "description" => ["required",'string'],
            "deadline" => ["required","date"],
            "user_id" => ["required","integer","exists:users,id"],
            "client_id" => ["required","integer","exists:clients,id"],
            "status" => ["required",Rule::in(Projects::STATUS_LIST)]

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
