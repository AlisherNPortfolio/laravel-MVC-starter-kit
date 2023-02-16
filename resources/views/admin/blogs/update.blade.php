@extends('admin.layouts.main')
@section('title', 'Static Translations | Update')
@section('header_scripts')
    <script src="{{ checked_asset('dashboard/assets/ckeditor/ckeditor.js') }}"></script>
@endsection
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
            <strong>Update</strong> Blog
        </div>
        <form action="{{ route('blog.update', $blog->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body card-block">
                <x-notifier :errors="$errors"></x-notifier>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="title" class=" form-control-label">Title</label></div>
                    <div class="col-4 col-md-4">
                        <x-translation-input type="input" name="title" class="form-control" placeholder="Title" sluggable="slug" :value="$blog"></x-translation-input>
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="category" class=" form-control-label">Category</label></div>
                    <div class="col-4 col-md-4">
                        <select name="category_id" id="category" class="form-control">
                            <option>Please select</option>
                            @foreach($categories as $catId => $name)
                                <option value="{{ $catId }}" {{ $blog->category_id === $catId ? "selected" : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-md-1"><label for="slug" class=" form-control-label">Slug</label></div>
                    <div class="col-4 col-md-4">
                        <input type="text" name="slug" id="slug" class="form-control" value="{{ $blog->slug ?? '' }}" placeholder="Slug">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="description" class=" form-control-label">Description</label></div>
                    <div class="col-10 col-md-10">
                        <x-translation-input type="textarea" name="description" class="form-control" :value="$blog" placeholder="Description" :rich-text-box="true"></x-translation-input>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="body" class=" form-control-label">Body</label></div>
                    <div class="col-10 col-md-10">
                        <x-translation-input type="textarea" name="body" class="form-control" :value="$blog" placeholder="Body" :rich-text-box="true"></x-translation-input>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="status" class=" form-control-label">Status</label></div>
                    <div class="col-4 col-md-4">
                        <select name="status" id="status" class="form-control">
                            <option value="ACTIVE" {{ $blog->status === 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
                            <option value="INACTIVE" {{ $blog->status === 'INACTIVE' ? 'selected' : '' }}>INACTIVE</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="image" class=" form-control-label">Image</label></div>
                    <div class="col-4 col-md-4">
                        <x-image-uploader name="image" :value="$blog"></x-image-uploader>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"></div>
                    <div class="col-4 col-md-4">
                        <img src="{{ $blog->thumbnail('image') }}" alt="{{ $blog->image }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="meta_title" class=" form-control-label">Meta title</label></div>
                    <div class="col-5 col-md-5">
                        <x-translation-input type="input" name="meta_title" class="form-control" :value="$blog" placeholder="Meta title"></x-translation-input>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="meta_keywords" class=" form-control-label">Meta keywords</label></div>
                    <div class="col-5 col-md-5">
                        <x-translation-input type="input" name="meta_keywords" class="form-control" :value="$blog" placeholder="Meta keywords"></x-translation-input>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="meta_description" class=" form-control-label">Meta description</label></div>
                    <div class="col-5 col-md-5">
                        <x-translation-input type="textarea" name="meta_description" class="form-control" :value="$blog" placeholder="Meta description" rows="1"></x-translation-input>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"><label for="created_at" class=" form-control-label">Created at</label></div>
                    <div class="col-5 col-md-5">
                        <input type="date" name="created_at" id="created_at" class="form-control" value="{{ date('Y-m-d', strtotime($blog->created_at)) }}">
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
