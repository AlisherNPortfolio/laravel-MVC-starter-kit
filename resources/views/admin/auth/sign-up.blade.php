@extends('admin.layouts.sign')
@section('title', 'sign-up')
@section('content')
<form action="{{ route('sign-up') }}" method="POST">
    <x-notifier :errors="$errors"></x-notifier>
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Name">
    </div>
    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary btn-flat mb-2 mt-4">Register</button>
{{--    <div class="social-login-content">--}}
{{--        <div class="social-button">--}}
{{--            <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>--}}
{{--            <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="register-link m-t-15 text-center">
        <p>Already have account ? <a href="/admin/sign-in"> Sign in</a></p>
    </div>
</form>
@endsection
