<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Scores;
use App\Models\Students;
use Illuminate\Http\Request;
use Nette\Schema\Elements\Structure;

class StudentController extends Controller
{
    public function detail($id){
        $data = Students::where('id', $id)->first();
        $courses = Courses::get();
        $scores = Scores::with('course')->where('student_id', $id)->get();
        return view('student.detail', compact('data', 'courses', 'scores'));
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

    public function showEdit($id){
        if(!$id) return back();

        $student = Students::where('id', $id)->first();
        return view('student.edit', compact('student'));
    }

    public function UpdateStudent($id, Request $request){
        $newName = $request->input('student-name');
        $newNim = $request->input('student-nim');
        
        $student = Students::where('id', $id)->first();
        
        if(!$id) return back();

        $updated_data = [];
        if($newName != $student->name){
            $updated_data['name'] = $newName;
        }
        if($newNim != $student->nim){
            $updated_data['nim'] = $newNim;
        }

        if(!empty($updated_data)){
            $student->update($updated_data);
            return redirect()->route('home');
        }
        
        return back()->withInput();
    }

    public function deleteStudent($id){
        $student = Students::where('id', $id)->first();
        if($student){
            $student->delete();
            return redirect()->route('home');
        }

        return back();
    }

    public function insertScore(Request $request){
        $student_id = $request->input('student-id');
        $course_id = $request->input('course-id');
        $score = $request->input('score');

        $insertData = Scores::create([
            'student_id' => $student_id,
            'course_id' => $course_id,
            'score' => $score
        ]);

        if($insertData) return redirect()->route('students.detail', $student_id);

        return back()->withInput();
    }
}
