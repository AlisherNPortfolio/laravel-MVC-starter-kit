@extends('admin.layouts.main')
@section('title', 'Profile')
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
                                <li class="active">Profile</li>
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
            <x-notifier :errors="$errors"></x-notifier>
            <div class="tab-pane fade show active" id="custom-nav-user" role="tabpanel"
                 aria-labelledby="custom-nav-user-data">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Change</strong> Email and Password
                            </div>
                            <form action="{{ route('profile-update-main') }}" method="post" class="">
                                @csrf
                                <div class="card-body card-block">
                                    <div class="form-group"><label for="nf-name"
                                                                   class=" form-control-label">Name</label><input
                                            type="text" id="nf-name" name="name" placeholder="Enter Name.."
                                            class="form-control" value="{{ $user->name }}"><span class="help-block">Please enter your name</span>
                                    </div>
                                    <div class="form-group"><label for="nf-email"
                                                                   class=" form-control-label">Email</label><input
                                            type="email" id="nf-email" name="email" placeholder="Enter Email.."
                                            class="form-control" value="{{ $user->email }}"><span class="help-block">Please enter your email</span>
                                    </div>
                                    <div class="form-group"><label for="nf-password" class=" form-control-label">Password</label><input
                                            type="password" id="password" name="password" placeholder="Enter Password.."
                                            class="form-control"><span
                                            class="help-block">Please enter your password</span></div>
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

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Change</strong> Profile data
                            </div>
                            <form action="{{ route('profile-update-additional') }}" method="post" class="" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body card-block">
                                    <div class="form-group"><label for="nf-first_name" class=" form-control-label">First
                                            name</label>
                                        <input type="text" id="nf-first_name" name="first_name"
                                                               placeholder="Enter First Name.." class="form-control"
                                                               value="{{ $user->profile->first_name ?? '' }}">
                                        <span class="help-block">Please enter your first name</span></div>
                                    <div class="form-group">
                                        <label for="nf-last_name" class=" form-control-label">Last name</label>
                                        <input type="text" id="nf-last_name" name="last_name"
                                                               placeholder="Enter Last name.." class="form-control"
                                                               value="{{ $user->profile->last_name ?? '' }}">
                                        <span class="help-block">Please enter your last name</span></div>
                                    <div class="form-group">
                                        <label for="select" class=" form-control-label">Select</label>
                                        <select name="gender" id="select" class="form-control">
                                            <option>Select gender</option>
                                            <option value="0" {{ isset($user->profile->gender) && $user->profile->gender === '0' ? 'selected' : '' }}>Female</option>
                                            <option value="1" {{ isset($user->profile->gender) && $user->profile->gender === '1' ? 'selected' : '' }}>Male</option>
                                        </select>
                                        <span
                                            class="help-block">Please enter your gender</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="textarea-input" class=" form-control-label">Self Description</label>
                                        <textarea name="self_description" id="textarea-input" rows="2" placeholder="Self description..." class="form-control">{{ $user->profile->self_description ?? ''}}</textarea>
                                        <span class="help-block">Please enter self description</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="textarea-input" class=" form-control-label">Address</label>
                                        <textarea name="address" id="textarea-input" rows="2" placeholder="Address..." class="form-control">{{ $user->profile->address ?? '' }}</textarea>
                                        <span class="help-block">Please enter address</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="validatedCustomFile" class=" form-control-label">Avatar</label>
                                        <x-image-uploader name="avatar" :value="$user->profile"></x-image-uploader>
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

                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <div class="card-header">
                                Avatar
                            </div>
                            <img src="{{
                                isset($user->profile, $user->profile->avatar) ?
                                $user->profile->thumbnail('avatar', '640')
                                : (isset($user->profile, $user->profile->gender) && $user->profile->gender === '0' ?
                                checked_asset('dashboard/images/avatar/avatar-female.png') :
                                checked_asset('dashboard/images/avatar/avatar-male.png'))
                            }}" alt="avatar"
                                 class="card-img p-4 rounded-circle">
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
