@extends('admin.layouts.main')
@section('title', 'Roles')
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
                                <li class="active">Permissions</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('admin.layouts.components.create', ['link' => 'permissions', 'can' => true])
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Roles</strong>
                    @include('admin.layouts.components.notifications')
                </div>
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Guard name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $key => $permission)
                            <tr>
                                <td> #{{ $permission->id }} </td>
                                <td>  <span class="name">{{ $permission->name }}</span> </td>
                                <td> <span class="product">{{ $permission->guard_name }}</span> </td>
                                <td>
                                    <x-crud link="permissions/{{ $permission->id }}" :actions="['all']"></x-crud>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div>
    </div>
@endsection
