@php
  $role_permissions = $role->permission->pluck(['name'])->toArray();
@endphp
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
                                <li><a href="#">Roles</a></li>
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
            <strong>Update</strong> Role
        </div>
        <form action="{{ route('role.update', $role->id) }}" method="post" class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="card-body card-block">
                <x-notifier :errors="$errors"></x-notifier>
                <div class="row">
                    <div class="col-6">
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="permission-name" class=" form-control-label">Role name</label></div>
                            <div class="col-10 col-md-8">
                                <input type="text" id="permission-name" name="name" placeholder="Name" value="{{ $role->name }}" class="form-control">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="guard-name" class=" form-control-label">Guard name</label></div>
                            <div class="col-10 col-md-8">
                                <select name="guard_name" id="guard-name" class="form-control-sm form-control">
                                    <option>Please select</option>
                                    @foreach($guards as $guard)
                                        <option value="{{ $guard }}" {{ $role->guard_name === $guard ? 'selected' : '' }}>{{ ucfirst($guard) }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        @foreach($permissions as $permission)
                            <p class="inline-block">
                                {{ $permission->name }}
                                <label class="switch switch-3d switch-primary mr-3">
                                    <input type="checkbox" class="switch-input" {{ in_array($permission->name, $role_permissions, true) ? 'checked' : ''  }} id="{{ $permission->name }}" name="permissions[{{$permission->id}}]">
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </p>
                        @endforeach
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
