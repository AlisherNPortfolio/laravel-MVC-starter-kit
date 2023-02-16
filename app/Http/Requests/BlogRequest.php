<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
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
            'title.*' => 'nullable|string|max:255|min:5',
            'title.' . fallback_lang() => 'required',
            'category_id' => 'required|int|exists:blog_categories,id',
            'slug' => 'required|string|min:5|max:255',
            'description.*' => 'nullable|string',
            'body.*' => 'nullable|string|min:2',
            'body.' . fallback_lang() => 'required|string|min:2',
            'status' => ['required', Rule::in(['ACTIVE', 'INACTIVE'])],
            'image' => 'required|string|max:255',
            'meta_title.*' => 'nullable|string|min:2|max:255',
            'meta_keywords.*' => 'nullable|string|min:2|max:255',
            'meta_description.*' => 'nullable|string|min:2|max:500',
            'created_at' => 'required|date:Y-m-d'
        ];
    }
}
