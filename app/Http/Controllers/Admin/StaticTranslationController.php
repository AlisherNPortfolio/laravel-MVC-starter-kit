<?php

namespace App\Http\Controllers\Admin;

use App\Classes\StaticTranslation;
use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaticTranslation as StaticTranslationRequest;

class StaticTranslationController extends Controller
{
    public function index()
    {
        $translations = StaticTranslation::query()->paginate(15);
        return view('admin.static-translation.index', compact('translations'));
    }

    public function create()
    {
        return view('admin.static-translation.create');
    }

    public function store(StaticTranslationRequest $request)
    {
        $validated = $request->validated();
        StaticTranslation::query()->create($validated);
        return MessageHelper::saved();
    }

    public function show($id)
    {
        if (!$translation = StaticTranslation::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }

        return view('admin.static-translation.show', compact('translation'));
    }

    public function edit($id)
    {
        if (!$translation = StaticTranslation::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }
        return view('admin.static-translation.update', compact('translation'));
    }

    public function update(StaticTranslationRequest $request, $id)
    {
        $validated = $request->validated();
        if (!$translation = StaticTranslation::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }

        $translation->update($validated);
        return MessageHelper::saved();
    }

    public function destroy($id)
    {
        if (!$translation = StaticTranslation::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }
        $translation->delete();
        return MessageHelper::deleted();
    }
}
