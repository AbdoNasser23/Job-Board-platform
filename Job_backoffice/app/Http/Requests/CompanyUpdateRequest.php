<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => [
                "bail",
                "required",
                "string",
                "max:255",
                Rule::unique('companies', 'name')
                    ->ignore($this->route('company')),
            ],

            "address" => "required|string|max:255",

            "industry" => "required|string|max:255",

            "website" => "nullable|url|max:255",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Company name is required.',
            'name.string'   => 'Company name must be a valid text.',
            'name.max'      => 'Company name must not exceed 255 characters.',
            'name.unique'   => 'This company already exists.',

            'address.required' => 'Company address is required.',
            'address.string'   => 'Company address must be a valid text.',
            'address.max'      => 'Company address must not exceed 255 characters.',

            'industry.required' => 'Industry is required.',
            'industry.string'   => 'Industry must be a valid text.',
            'industry.max'      => 'Industry must not exceed 255 characters.',

            'website.url' => 'Website must be a valid url.',
            'website.max' => 'Website must not exceed 255 characters.',
        ];
    }
}
