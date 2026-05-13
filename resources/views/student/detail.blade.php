@extends('layouts.master')
@section('title', 'Student Detail')
@section('content')
    <div class="container">
        {{-- {{ dd($data) }} --}}
        <h3>Name: {{ $data['name'] }}</h3>
        <h2>Score List</h2>
        <ul class="list-group">
            @foreach ($data['score'] as $score)
                @php
                    if($score >= 90) $grade = 'A';
                    else $grade = 'D';
                @endphp

                <li class="list-group-item">Score: {{ $score }} - Grade {{ $grade }}</li>
            @endforeach
        </ul>

    </div>
@endsection