<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, Student $student)
    {
        $request->validate([
            'id' => ['required','numeric', 'between:1000,9000', 'exists:students,college_id'],
        ]);

        $search = Student::where('college_id', $request->id)->first();

        return view('pages.results', compact('search'));
    }


}
