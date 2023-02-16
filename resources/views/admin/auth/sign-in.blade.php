@extends('admin.layouts.sign')
@section('title', 'Sign in')
@section('content')
<form action="{{ route('sign-in') }}" method="POST">
    <x-notifier :errors="$errors"></x-notifier>
    @csrf
    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label>
        <label class="pull-right">
            <a href="#">Forgotten Password?</a>
        </label>

    </div>
    <button type="submit" class="btn btn-success btn-flat mb-2 mt-4">Sign in</button>
{{--    <div class="social-login-content">--}}
{{--        <div class="social-button">--}}
{{--            <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>--}}
{{--            <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="register-link m-t-15 text-center">
{{--        <p>Don't have account ? <a href="{{ route('sign-up') }}"> Sign Up Here</a></p>--}}
    </div>
</form>
@endsection
