@extends('admin.layouts.main')
@section('title', 'Users')
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
                                <li class="active">Users</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('admin.layouts.components.create', ['link' => 'users', 'can' => true])
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Custom Table</strong>
                </div>
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th class="avatar">Avatar</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td class="serial">{{ $key+1 }}.</td>
                                <td class="avatar">
                                    <div class="round-img">
                                        <a href="#">
                                            <img class="rounded-circle" src="{{
                                                isset($user->profile, $user->profile->avatar) ?
                                                $user->profile->thumbnail('avatar') :
                                                (isset($user->profile, $user->profile->gender) && $user->profile->gender === '0'
                                                    ? checked_asset('dashboard/images/avatar/avatar-female.png') :
                                                     checked_asset('dashboard/images/avatar/avatar-male.png'))
                                                 }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td> #{{ $user->id }} </td>
                                <td>  <span class="name">{{ $user->name }}</span> </td>
                                <td> <span class="product">{{ $user->email }}</span> </td>
                                <td>
                                    <x-crud link="users/{{ $user->id }}" :actions="['all']"></x-crud>
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
