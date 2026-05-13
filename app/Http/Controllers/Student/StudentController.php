<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function detail($id){
        $students = [
            [
                'id' => 1,
                'name' => 'kuda',
                'score' => [97,95,90]
            ],
            [
                'id' => 2,
                'name' => 'ayam',
                'score' => [90,95,100]
            ],
            [
                'id' => 3,
                'name' => 'naga',
                'score' => [67,89,88]
            ],
        ];

        $data = collect($students)->firstWhere('id', $id);
        return view('student.detail', compact('data'));
    }

    public function showCreate(){
        return view('student.create');
    }

    public function insertStudent(Request $request){
        $name = $request->input('student-name');
        $nim = $request->input('student-nim');

        $process = Students::create([
            'name' => $name,
            'nim' => $nim
        ]);

        if(!$process) return back()->withInput(["Failed create new student"]);

        return redirect()->route('home');
    }
}
