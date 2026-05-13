@extends('layouts.master')
@section('content')
    @include('layouts.navbar')
    <div class="row">
        <div class="col-6 bg-secondary"></div>
        <div class="col-6 vh-100 d-flex align-items-center justify-content-center">
            <div class="card p-4 m-5" style="width: 400px">
                <h2>Login</h2>
                <form action="{{ route('login.do') }}" method="POST">
                    @csrf
                    <div class="my-3">
                        <label for="username">Username</label>
                        <input value="{{ old('username') }}" type="text" class="form-control" name="username">
                    </div>
                    <div class="my-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    @if (session('error_message'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error_message') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary mt-2 w-100">Login</button>
                </form>
                <a href="{{ route('register.view') }}" class="btn mt-2 btn-primary">Register Now</a>
            </div>
        </div>
    </div>
    {{-- <h1>Login wkwkwkwk</h1>
    <a href="{{ route('register.view') }}">Go register</a>
    <a href="{{ route('product.list') }}">Product List</a>
    <a href="{{ route('product.detail', 45) }}">Product Detail</a> --}}
@endsection