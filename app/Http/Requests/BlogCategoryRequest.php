<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole(['administrator']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name.*' => 'nullable|string|min:2|max:100',
            'name.'.fallback_lang() => 'required',
            'slug' => [
                'required',
                Rule::unique('blog_categories')->ignore($this->slug, 'slug'),
                'min:2',
                'max:255'
            ],
            'image' => 'string|max:255'
        ];
    }
}
