<?php

namespace App\Http\Controllers;

use App\Http\Requests\MajorStoreRequest;
use App\Models\Major;


class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::with('subjects')->orderBy('created_at', 'asc')->paginate(5);
        return view('admin.majors', compact('majors'));
    }

    public function majorDetails($id)
    {
        $major = Major::findOrFail($id);

        return view('admin.major_details', compact('major'));

    }

    public function addMajor()
    {
        return view('admin.add_major');
    }

    public function storeMajor(MajorStoreRequest $request)
    {
        Major::create([
            'name' => $request->validated()['name'],
        ]);

        return redirect()->route('majors');
    }

    public function deleteMajor($id)
    {
        try {
            $major = Major::findOrFail($id);
            $major->delete();

            return redirect()->route('majors');
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during deletion
            return redirect()->back()->with('error', 'Failed to delete major');
        }
    }
}
