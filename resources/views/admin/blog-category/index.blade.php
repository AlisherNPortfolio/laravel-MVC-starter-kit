@extends('admin.layouts.main')
@section('title', 'Blog Categories')
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
                                <li class="active">Blog Categories</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
{{--    @include('admin.layouts.components.create', ['link' => 'blog-category', 'can' => true])--}}
    <x-create link="blog-category" :can="true"></x-create>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Blog Categories</strong>
                </div>
                <div class="table-stats order-table ov-h">
                    <x-notifier :errors="$errors"></x-notifier>
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <tr>
                                    <td><span class="name">{{ $category->name }}</span> </td>
                                    <td>
                                        @if($category->image)
                                            <img src="{{ $category->thumbnail('image') }}" alt="{{ $category->image }}">
                                        @else
                                            <img src="{{ checked_asset('dashboard/images/no-image.png') }}" alt="">
                                        @endif
                                    </td>
                                    <td>
{{--                                        @include('admin.layouts.components.crud',['link' =>'blog-category/' . $category->id, 'actions' => ['all']])--}}
                                        <x-crud link="blog-category/{{$category->id}}" :actions="['all']"></x-crud>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3"><h3 class="text-center color-red">Categories not found</h3></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div> <!-- /.table-stats -->
            </div>
        </div>
    </div>
@endsection
