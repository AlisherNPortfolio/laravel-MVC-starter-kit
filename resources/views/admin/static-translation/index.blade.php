@php
$mainLang = fallback_lang();
@endphp
@extends('admin.layouts.main')
@section('title', 'Static Translations')
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
                                <li class="active">Static Translations</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('admin.layouts.components.create', ['link' => 'static-translations', 'can' => true])
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Static Translations</strong>
                </div>
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>Key</th>
                            <th>Value</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($translations as $translation)
                            <tr>
                                <td><span class="name">{{ $translation->key }}</span> </td>
                                <td><span class="product">{{ $translation->value ?? '' }}</span> </td>
                                <td>
                                    <x-crud link="static-translations/{{ $translation->id }}" :actions="['all']"></x-crud>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $translations->links() }}
                </div> <!-- /.table-stats -->
            </div>
        </div>
    </div>
@endsection
