<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Subject;
use App\Http\Requests\SubjectStoreRequest;

class SubjectController extends Controller
{
    public function addSubject(SubjectStoreRequest $request, $id)
    {
        $major = Major::findOrFail($id);

        Subject::create([
            'name' => $request->validated()['name'],
            'major_id' => $major->id,
        ]);

        return redirect()->route('major.details', ['id' => $id]);
    }
}
