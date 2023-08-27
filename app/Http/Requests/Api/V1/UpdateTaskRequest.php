<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return is_null($this->task->deleted_at);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user' => ['required', 'string', 'min:3', 'max:255'],
            'title' => ['required', 'string', 'unique:tasks,title,' . $this->task->id . ',id,deleted_at,NULL', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:3', 'max:65535'],
            'completed' => ['required', 'boolean'],
        ];
    }
}
