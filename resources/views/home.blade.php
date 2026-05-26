@extends('layouts.master')
@section('title', 'Home Page')

@section('content')
    @include('layouts.navbar')
    <div class="container">
        <a href="{{ route('students.create') }}" class="btn btn-primary mt-4">Add New Student</a>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>score</th>
                    <th>average</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    @php
                        $avg = $student->getAverage();
                    @endphp
                    <tr>
                        <td>{{ $student['id'] }}</td>
                        <td><a href="{{ route('students.detail', $student['id']) }}">{{ $student['name'] }}</a></td>
                        <td>{{ $avg }}</td>
                        <td>{{ number_format($avg, 2) }}</td>
                        <td>
                            @if ($avg >= 65 && $avg < 80)
                                {{ 'Passed' }}
                            @elseif ($avg >= 80 && $avg < 90)
                                {{ 'Bu Zul suka' }}
                            @else
                                {{ 'Complate' }}
                            @endif
                        </td>
                        <td class="d-flex flex-row gap-2 align-item-center">
                            <a href="{{ route('students.edit', $student['id'])}}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete Student Data ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection