@extends('layouts.master')
@section('title', 'Login Page')
@section('content')
    @include('layouts.navbar')
    <div class="row">
        <div class="col-6 bg-secondary"></div>
        <div class="col-6 vh-100 d-flex align-items-center justify-content-center">
            <div class="card p-4 m-5" style="width: 400px">
                <h2>Register</h2>
                <form action="">
                    <div class="my-3">
                        <label for="uname">Username</label>
                        <input type="text" class="form-control" name="uname">
                    </div>
                    <div class="my-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="my-3">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <a href="{{ route('login.view') }}" class="btn btn-primary">Login</a>
                </form>
            </div>
        </div>
    </div>
@endsection