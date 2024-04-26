<?php

namespace Modules\Projects\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Projects\App\Models\Projects;

class ProjectUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "title"=> ["nullable","string"],
            "description" => ["nullable",'string'],
            "deadline" => ["nullable","date"],
            "user_id" => ["required","integer"],
            "client_id" => ["required","integer"],
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
