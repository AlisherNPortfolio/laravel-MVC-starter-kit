@extends('admin.layouts.main')
@section('title', 'Blog Categories | Create')
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
                                <li><a href="#">Blog Categories</a></li>
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
            <strong>Create</strong> Blog Categories
        </div>
        <form action="{{ route('blog-category.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card-body card-block">
                <x-notifier :errors="$errors"></x-notifier>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="category_name" class=" form-control-label">Category Name</label></div>
                    <div class="col-10 col-md-8">
                        <x-translation-input type="input" name="name" id="category_name" class="form-control" placeholder="Category name" sluggable="slug"></x-translation-input>
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="value" class=" form-control-label">Slug</label></div>
                    <div class="col-10 col-md-8">
                        <input type="text" class="form-control" placeholder="Slug" name="slug">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="validatedCustomFile" class=" form-control-label">Image</label></div>
                    <div class="col-10 col-md-8">
                        <x-image-uploader name="image"></x-image-uploader>
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
