@extends('layouts.master')
@section('title', 'Add New Student')
@section('content')
    @include('layouts.navbar')
    <div class="container mt-4">
        <div class="card pt-4">
            <form action="{{ route('students.insert') }}" method="post">
                @csrf
                <div class="m-2">
                    <label for="form-label">Student Name</label>
                    <input type="text" class="form-control" name="student-name" required>
                </div>
                <div class="m-2">
                    <label for="form-label">Student Nim</label>
                    <input type="text" class="form-control" name="student-nim" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Student</button>
            </form>
        </div>
    </div>
@endsection