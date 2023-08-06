@extends('layouts.app')
@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class=" p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Add Students</h2>
            <button
                class=" px-4 py-2 bg-blue-500 text-white font-medium rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <a href="{{ route('students') }}">Back</a>
            </button>
            <form action="{{ route('student.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" id="name" name="name" required
                        class="border bg-gray-200 border-gray-300 py-2 px-4 rounded-lg w-full">
                    @if ($errors->has('name'))
                        <div class="text-danger text-red-400">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="age" class="block text-gray-700">College ID:</label>
                    <input type="number" id="age" name="college_id" required
                        class="border bg-gray-200 border-gray-300 py-2 px-4 rounded-lg w-full">
                    @if ($errors->has('college_id'))
                        <div class="text-danger text-red-400">{{ $errors->first('college_id') }}</div>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="grade" class="block  text-gray-700">Major:</label>
                    <select id="grade" name="major_id" required
                        class="border bg-gray-200 border-gray-300 py-2 px-4 rounded-lg w-full">
                        <option value="">Select a Major</option>
                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('major'))
                        <div class="text-danger text-red-400">{{ $errors->first('major_id') }}</div>
                    @endif
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add
                    Student</button>
            </form>
        </div>
    </div>
@endsection
