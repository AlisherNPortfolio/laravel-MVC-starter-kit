<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchDropdown extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole(['administrator']); // TODO: change administrator role to search-dropdown
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'search' => 'required|string'
        ];
    }
}
