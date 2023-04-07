<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddReviewerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [

            'category_id' => ['required','integer'],
            'reviewer_int' => ['required','string'],
            'reviewer_ext' => ['required','string'],
            'published' => ['nullable'],
            
        ];

        return $rules;
    }
}
