@php
$mainLang = fallback_lang();
@endphp
@extends('admin.layouts.main')
@section('title', 'Blog | Create')
@section('bread_crumbs')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Blog</a></li>
                                <li class="active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Create</strong> Blog
        </div>
        <form action="{{ route('blog.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card-body card-block">
                <x-notifier :errors="$errors"></x-notifier>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="title" class=" form-control-label">Title</label></div>
                    <div class="col-4 col-md-4">
                        <x-translation-input type="input" name="title" class="form-control" placeholder="Title" sluggable="slug"></x-translation-input>
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="category" class=" form-control-label">Category</label></div>
                    <div class="col-4 col-md-4">
                        <select name="category_id" id="category" class="form-control" required>
                            <option>Please select</option>
                            @foreach($categories as $catId => $name)
                                <option value="{{ $catId }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-md-1"><label for="slug" class=" form-control-label">Slug</label></div>
                    <div class="col-4 col-md-4">
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="description" class=" form-control-label">Description</label></div>
                    <div class="col-10 col-md-10">
                        <x-translation-input type="textarea" name="description" class="form-control" placeholder="Description" :rich-text-box="true"></x-translation-input>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="body" class=" form-control-label">Body</label></div>
                    <div class="col-10 col-md-10">
                        <x-translation-input type="textarea" name="body" class="form-control" placeholder="Body" :rich-text-box="true"></x-translation-input>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="status" class=" form-control-label">Status</label></div>
                    <div class="col-4 col-md-4">
                        <select name="status" id="status" class="form-control" required>
                            <option>Please select</option>
                            <option value="ACTIVE">ACTIVE</option>
                            <option value="INACTIVE">INACTIVE</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="image" class=" form-control-label">Image</label></div>
                    <div class="col-4 col-md-4">
                        <x-image-uploader name="image" required></x-image-uploader>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="meta_title" class=" form-control-label">Meta title</label></div>
                    <div class="col-5 col-md-5">
                        <x-translation-input type="input" name="meta_title" class="form-control" placeholder="Meta title"></x-translation-input>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="meta_keywords" class=" form-control-label">Meta keywords</label></div>
                    <div class="col-5 col-md-5">
                        <x-translation-input type="input" name="meta_keywords" class="form-control" placeholder="Meta keywords"></x-translation-input>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="meta_description" class=" form-control-label">Meta description</label></div>
                    <div class="col-5 col-md-5">
                        <x-translation-input type="textarea" name="meta_description" class="form-control" placeholder="Meta description" rows="1"></x-translation-input>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="created_at" class=" form-control-label">Created at</label></div>
                    <div class="col-5 col-md-5">
                        <input type="date" name="created_at" id="created_at" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </form>
    </div>
@endsection
