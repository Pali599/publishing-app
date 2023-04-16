<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class EditUserArticleFormRequest extends FormRequest
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

        $fileRule = $this->route()->named('store') ? 'required' : 'nullable';

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required|integer',
            'description' => 'required',
            'file' => "{$fileRule}|mimes:pdf,doc,docx|max:2048",
            'keywords' => 'required',
            'letter' => 'mimes:pdf,doc,docx|max:2048',
            'suggested_reviewers.*' => 'string',
            'unwanted_reviewers.*' => 'string',
        ];

        return $rules;
    }
}
