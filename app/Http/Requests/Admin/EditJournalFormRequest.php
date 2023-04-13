<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditJournalFormRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'version' => 'required|string',
            'file' => "{$fileRule}|mimes:pdf,doc,docx|max:2048",
            'published' => 'nullable',
        ];

        return $rules;
    }
}
