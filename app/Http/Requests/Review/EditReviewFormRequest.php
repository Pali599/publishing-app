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
            'comment' => 'string|max:255',
            'improve' => 'string|max:255',
            'comment_author' => 'string|max:255',
            'originality' => 'integer',
            'contribution' => 'integer',
            'technical_quality' => 'integer',
            'presentation_clarity' => 'integer',
            'research_depth' => 'integer',
        ];

        return $rules;
    }
}
