@extends('admin.layouts.sign')
@section('title', '403')
@section('content')
    <h2 class="mb-3">You are forbidden to this page</h2>
    @if(Auth::check())
        <h4>Please, enter another valid user data</h4>
        <form action="{{ route('log-out') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning">Sign in</button>
        </form>
    @else
        <h4>Please, go home page</h4>
        <a href="{{ route('/') }}" class="btn btn-warning">Home</a>
    @endif
@endsection
