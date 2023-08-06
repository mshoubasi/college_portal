@extends('layouts.app')
@section('content')
    <div class="bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <h2 class="text-2xl font-bold mb-2">Student Details</h2>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2 md:col-span-1">
                            <h3 class="text-lg font-semibold mb-2">{{ $student->name }}</h3>
                            <p class="text-gray-500 mb-4">{{ $student->major->name }}</p>
                            <button
                                class=" px-4 py-2 bg-blue-500 text-white font-medium rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <a href="{{ route('students') }}">Back</a>
                            </button>
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th
                                            class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Grade
                                        </th>
                                        <th
                                            class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Add Grade
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($student->major->subjects as $subject)
                                        @php
                                            $grade = $student->grades->where('subject_id', $subject->id)->first();
                                        @endphp
                                        <tr class="bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $subject->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ optional($grade)->grade }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form
                                                    action="{{ route('add.grade', ['id' => $student->id, 'subjectId' => $subject->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="number" name="grade"
                                                        class="border bg-gray-200 border-gray-300 py-2 px-4 rounded-lg w-full">
                                                    @error('grade')
                                                        <div class="text-danger text-red-400">{{ $message }}</div>
                                                    @enderror
                                                    <button
                                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                                        type="submit">Add</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-center">
                                                No subjects found for the student.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
