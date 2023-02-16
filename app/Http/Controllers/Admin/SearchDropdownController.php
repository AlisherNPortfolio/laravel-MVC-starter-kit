<?php

namespace App\Http\Controllers\Admin;

use App\Classes\StaticTranslation;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchDropdown;

class SearchDropdownController extends Controller
{
    public function staticTranslation(SearchDropdown $request)
    {
        $validated = $request->validated();
        $result = StaticTranslation::query()->where('key', 'like', '%' . $validated['search'] . '%')->get()->pluck('key');
        return response()->json($result);
    }
}
