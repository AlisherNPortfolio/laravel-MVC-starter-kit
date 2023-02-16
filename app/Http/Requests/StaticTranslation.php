<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaticTranslation extends FormRequest
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
            'key' => 'required|string|max:100|min:2',
            'value.*' => 'nullable|string|min:2',
            'value.' . fallback_lang() => 'required',
        ];
    }
}
