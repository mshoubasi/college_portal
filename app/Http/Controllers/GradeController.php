<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Major;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradeController extends Controller
{
public function addGrade(Request $request, $id, $subjectId)
{
    $student = Student::findOrFail($id);
    $subject = Subject::findOrFail($subjectId);

    $request->validate([
        'grade' => ['required', 'numeric', 'between:0,100'],
    ]);

    Grade::create([
        'grade' => $request->grade,
        'student_id' => $student->id,
        'subject_id' => $subjectId
    ]);

    return redirect()->route('student.details', ['id' => $student->id, 'subjectId' => $subject->id]);
}
}
