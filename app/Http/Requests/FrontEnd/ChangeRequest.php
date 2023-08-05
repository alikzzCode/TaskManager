<?php

namespace App\Http\Requests\FrontEnd;

use Illuminate\Foundation\Http\FormRequest;

class ChangeRequest extends FormRequest
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
            'title' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'exists:users,id',
            'priority' => 'exists:tasks,priority',
            'description' => 'required|min:10',
            'expectedEndDate' => 'date|after:start_date',
        ];
    }
}
