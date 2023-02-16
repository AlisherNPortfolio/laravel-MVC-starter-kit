@extends('admin.layouts.main')
@section('title', 'Show role')
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
                                <li><a href="#">Roles</a></li>
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
            <strong class="card-title">Role #ID {{$role->id}}</strong>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Name</th>
                    <td>{{ $role->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Guard Name</th>
                    <td>{{ $role->guard_name }}</td>
                </tr>
                @if($role->permission)
                <tr>
                    <th scope="row">Permissions</th>
                    <td>
                        <div class="row">
                            @foreach($role->permission as $permission)
                                <div class="col-3">
                                    {{ $permission->name }}
                                    <label class="switch switch-3d switch-primary mr-3">
                                        <input type="checkbox" class="switch-input" checked disabled>
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
