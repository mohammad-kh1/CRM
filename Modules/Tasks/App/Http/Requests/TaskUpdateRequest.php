<?php

namespace Modules\Tasks\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Tasks\App\Models\Tasks;

class TaskUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "title" => ["nullable","string"],
            "description" => ["nullable"],
            "deadline" => ["nullable","date"],
            "user_id" => ["nullable","integer","exists:users,id"],
            "client_id" => ["nullable","integer","exists:clients,id"],
            "project_id" => ["nullable","integer","exists:projects,id"],
            "status" => ["nullable",Rule::in(Tasks::STATUS_LIST)],
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
