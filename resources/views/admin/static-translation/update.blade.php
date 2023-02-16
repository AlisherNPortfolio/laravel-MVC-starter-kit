@extends('admin.layouts.main')
@section('title', 'Static Translations | Update')
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
            <strong>Update</strong> Static Translation
        </div>
        <form action="{{ route('static-translations.update', $translation->id) }}" method="post" class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="card-body card-block">
                <x-notifier :errors="$errors"></x-notifier>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="permission-name" class=" form-control-label">Key</label></div>
                    <div class="col-10 col-md-8">
                        <input type="text" id="permission-name" name="key" placeholder="Name" value="{{ $translation->key }}" class="form-control">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="value" class=" form-control-label">Value</label></div>
                    <div class="col-10 col-md-8">
                        <x-translation-input name="value" type="textarea" class="form-control" :value="$translation" placeholder="Value"></x-translation-input>
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
