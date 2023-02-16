<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::query()->paginate(15);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::query()->pluck('name', 'id')->all();
        if (count($categories) === 0) {
            return back()->with(MessageHelper::MESSAGE_TYPE_SUCCESS, 'First, create a category, please!');
        }
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->getAuthIdentifier();
        $blog = Blog::query()->create($validated);
        $blog->uploadImage();

        Session::flash(MessageHelper::MESSAGE_TYPE_SUCCESS, MessageHelper::SAVED_SUCCESSFULLY_TEXT);
        return redirect('/admin/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$blog = Blog::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }

        $categories = BlogCategory::query()->pluck('name', 'id')->all();
        if (count($categories) === 0) {
            return back()->with(MessageHelper::MESSAGE_TYPE_SUCCESS, 'First, create a category, please!');
        }

        return view('admin.blogs.update', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        if (!$blog = Blog::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }

        $validated = $request->validated();
        $blog = Blog::query()->create($validated);
        $blog->uploadImage();

        Session::flash(MessageHelper::MESSAGE_TYPE_SUCCESS, MessageHelper::SAVED_SUCCESSFULLY_TEXT);
        return redirect('/admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
