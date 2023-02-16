@extends('admin.layouts.main')
@section('title', 'Static Translations | Show')
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
                                <li class="active">Show</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Translation #ID {{$translation->id}}</strong>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Key</th>
                    <td>{{ $translation->key }}</td>
                </tr>
                <tr>
                    <th scope="row">Value</th>
                    <td>
                        <x-show-translations :translations="$translation" name="value"></x-show-translations>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
