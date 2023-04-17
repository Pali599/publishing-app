<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;

class EditReviewFormRequest extends FormRequest
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
            'improve' => 'nullable|string|max:255',
            'comment_author' => 'nullable|string|max:255',
            'originality' => 'nullable|integer',
            'contribution' => 'nullable|integer',
            'technical_quality' => 'nullable|integer',
            'presentation_clarity' => 'nullable|integer',
            'research_depth' => 'nullable|integer',
        ];

        return $rules;
    }
}
