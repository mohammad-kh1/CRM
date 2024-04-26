<?php

namespace Modules\Tasks\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Tasks\App\Models\Tasks;

class TaskCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "title" => ["required","string"],
            "description" => ["required","string"],
            "deadline" => ["required","date"],
            "user_id" => ["required","integer","exists:users,id"],
            "client_id" => ["required","integer","exists:clients,id"],
            "project_id" => ["required","integer","exists:projects,id"],
            "status" => ["required",Rule::in(Tasks::STATUS_LIST)],
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
