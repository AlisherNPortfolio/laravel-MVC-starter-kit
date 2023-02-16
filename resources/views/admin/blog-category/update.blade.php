@extends('admin.layouts.main')
@section('title', 'Blog Category | Update')
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
                                <li><a href="#">Blog Category</a></li>
                                <li class="active">Update</li>
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
            <strong>Update</strong> Blog Category
        </div>
        <form action="{{ route('blog-category.update', $category->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body card-block">
                <x-notifier :errors="$errors"></x-notifier>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="permission-name" class=" form-control-label">Category Name</label></div>
                    <div class="col-10 col-md-8">
                        <x-translation-input type="input" name="name" id="category_name" class="form-control" placeholder="Category name" sluggable="slug" :value="$category"></x-translation-input>
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="value" class=" form-control-label">Slug</label></div>
                    <div class="col-10 col-md-8">
                        <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{ $category->slug }}">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="validatedCustomFile" class=" form-control-label">Image</label></div>
                    <div class="col-10 col-md-8">
                        <x-image-uploader name="image" :value="$category"></x-image-uploader>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2"></div>
                    <div class="col-10 col-md-8">
                        <img src="{{ $category->thumbnail('image') }}" alt="" width="90" class="clearfix">
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
