<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('major')->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.students', compact('students'));
    }

    public function studentDetails($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.student_details', compact('student'));
    }

    public function addStudent()
    {
        $majors = Major::select('id', 'name')->cursor();
        return view('admin.add_student', compact('majors'));
    }

    public function storeStudent(StudentStoreRequest $request)
    {
        Student::create([
            'name' => $request->validated()['name'],
            'college_id' => $request->validated()['college_id'],
            'major_id' => $request->validated()['major_id'],
        ]);

        return redirect()->route('students');
    }


    public function search(Request $request)
    {
        $query = Student::query();

        if ($request->has('q')) {

            $searchTerm = '%' . $request->q . '%';
            $query->where('name', 'like', $searchTerm);
        }

        $search = $query->paginate(5);

        return view('admin.search', compact('search'));
    }
}
