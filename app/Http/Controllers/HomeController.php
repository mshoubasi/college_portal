<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalMajors = Major::count();
        return view('pages.home', compact('totalStudents', 'totalMajors'));
    }
}
