@extends('admin.layouts.main')
@section('title', 'Static Translations | Create')
@section('styles')
    <link rel="stylesheet" href="{{ checked_asset('dashboard/assets/css/search-dropdown.css') }}">
@endsection
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
                                <li><a href="#">Static Translations</a></li>
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
            <strong>Create</strong> Static Translation
        </div>
        <form action="{{ route('static-translations.store') }}" method="post" class="form-horizontal">
            @csrf
            <div class="card-body card-block">
                <x-notifier :errors="$errors"></x-notifier>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="search-dropdown" class=" form-control-label">Key</label></div>
                    <div class="col-10 col-md-8">
                        <input type="text" id="search-dropdown" name="key" placeholder="Unique key" class="form-control">
                        <div class="search__dropdown">

                        </div>
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="value" class=" form-control-label">Value</label></div>
                    <div class="col-10 col-md-8">
                        <x-translation-input name="value" type="textarea" class="form-control" placeholder="Value"></x-translation-input>
                        <small class="form-text text-muted">This is a help text</small>
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
