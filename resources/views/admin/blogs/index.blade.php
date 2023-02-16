@extends('admin.layouts.main')
@section('title', 'Blog')
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
                                <li class="active">Blog</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <x-create link="blog" :can="true"></x-create>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Blog</strong>
                </div>
                <div class="table-stats order-table ov-h">
                    <x-notifier :errors="$errors"></x-notifier>
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($blogs) > 0)
                            @foreach($blogs as $blog)
                                <tr>
                                    <td><span class="name">{{ $blog->title }}</span> </td>
                                    <td><span class="badge {{ $blog->status === 'ACTIVE' ? 'badge-success' : 'badge-warning' }}">{{ $blog->status }}</span> </td>
                                    <td>
                                        <img src="{{ $blog->thumbnail('image') }}" alt="">
                                    </td>
                                    <td>
                                        <x-crud link="blog/{{$blog->id}}" :actions="['all']"></x-crud>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3"><h3 class="text-center color-red">Blog not found</h3></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {{ $blogs->links() }}
                </div> <!-- /.table-stats -->
            </div>
        </div>
    </div>
@endsection
