<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;

class AddReviewFormRequest extends FormRequest
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
            'result' => 'required|string',
            'comment' => 'required|string|max:255',
        ];

        return $rules;
    }
}