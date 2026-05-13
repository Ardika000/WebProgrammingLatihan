<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // $students = [
        //     [
        //         'id' => 1,
        //         'name' => 'kuda',
        //         'score' => [97,95,90]
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'ayam',
        //         'score' => [90,95,100]
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'naga',
        //         'score' => [67,89,88]
        //     ],
        // ];
        // return view('home', compact('students'));
        $students = Students::get();
        return view('home', compact('students'));
    }
}
