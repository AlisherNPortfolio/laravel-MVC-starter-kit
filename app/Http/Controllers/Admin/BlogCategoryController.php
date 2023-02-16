<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Session;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $categories = BlogCategory::query()->paginate(15);
        return view('admin.blog-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryRequest $request)
    {
        BlogCategory::query()->create($request->all());

        Session::flash(MessageHelper::MESSAGE_TYPE_SUCCESS, MessageHelper::SAVED_SUCCESSFULLY_TEXT);
        return redirect('/admin/blog-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$category = BlogCategory::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }

        return view('admin.blog-category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$category = BlogCategory::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }
        return view('admin.blog-category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryRequest $request, $id)
    {
        if (!$category = BlogCategory::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }
        $category->update($request->all());

        return MessageHelper::saved();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$category = BlogCategory::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }
        $category->delete();
        return MessageHelper::deleted();
    }

}
