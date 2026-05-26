@extends('layouts.master')
@section('title', 'Add New Student')
@section('content')
    @include('layouts.navbar')
    <div class="container mt-4">
        <div class="card pt-4">
            <form action="{{ route('students.update', $student->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="m-2">
                    <label for="form-label">Student Name</label>
                    <input value="{{ old('student_name', $student->name) }}" type="text" class="form-control" name="student-name" required>
                </div>
                <div class="m-2">
                    <label for="form-label">Student Nim</label>
                    <input value="{{ old('student_nim', $student->nim) }}" type="text" class="form-control" name="student-nim" required>
                </div>
                <button type="submit" class="btn btn-primary">Edit Student</button>
            </form>
        </div>
    </div>
@endsection