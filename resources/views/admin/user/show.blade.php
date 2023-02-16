@extends('admin.layouts.main')
@section('title', 'Show user')
@section('breadcrumbs')
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
                                <li><a href="#">Users</a></li>
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
    <div class="custom-tab">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="custom-nav-user-data" data-toggle="tab" href="#custom-nav-user"
                    role="tab" aria-controls="custom-nav-user" aria-selected="true">Main data</a>
                <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile"
                    role="tab" aria-controls="custom-nav-profile" aria-selected="false">Profile</a>
            </div>
        </nav>
        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
            <div class="tab-pane fade show active" id="custom-nav-user" role="tabpanel"
                aria-labelledby="custom-nav-user-data">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                Email and Password
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="nf-name" class=" form-control-label">Name</label>
                                    <p id="nf-name" class="help-block">{{ $user->name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="nf-email" class=" form-control-label">Email</label>
                                    <p id="nf-email" class="help-block">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                Profile data
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="nf-first_name" class=" form-control-label">First name</label>
                                    <p class="help-block">{{ $user->profile->first_name ?? '-' }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="nf-last_name" class=" form-control-label">Last name</label>
                                    <p class="help-block">{{ $user->profile->last_name ?? '-' }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="select" class=" form-control-label">Gender</label>
                                    <p id="select" class="help-block">{{ isset($user->profile->gender) && $user->profile->gender === '0' ? 'Female' : 'Male' }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="textarea-input" class=" form-control-label">Self Description</label>

                                    <p class="help-block">{{ $user->profile->self_description ?? '-' }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="textarea-input" class=" form-control-label">Address</label>
                                    <p id="textarea-input" class="help-block">{{ $user->profile->address ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <div class="card-header">
                                Avatar
                            </div>
                            <img src="{{ isset($user->profile, $user->profile->avatar)
                                ? $user->profile->thumbnail('avatar', '640')
                                : (isset($user->profile, $user->profile->gender) && $user->profile->gender === '0'
                                    ? checked_asset('dashboard/images/avatar/avatar-female.png')
                                    : checked_asset('dashboard/images/avatar/avatar-male.png')) }}"
                                alt="avatar" class="card-img p-4 rounded-circle">
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
