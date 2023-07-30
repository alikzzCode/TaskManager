<?php

namespace App\Http\Requests\Admin\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
//            'user_id' => 'required|exists:users,id',
            'priority' => 'required|in:high,medium,low',
            'description' => 'required|min:10',
            'expectedEndDate' => 'required|date|after:start_date',
            'source_url' => 'required|image|mimes:png,jpg,jpeg,'
        ];
    }
}
