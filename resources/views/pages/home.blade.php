@extends('layouts.app')
@section('content')
    @auth
        <div class="container mx-auto my-8">
            <div class="flex items-center justify-evenly h-screen">
                <div class="bg-white p-20 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-4">Students</h2>
                    <p class="text-gray-700 mb-2">Total Students: {{ $totalStudents }}</p>
                    <a href="{{ route('students') }}" class="text-blue-500 hover:text-blue-700">View Details</a>
                </div>
                <div class="bg-white p-20 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-4">Majors</h2>
                    <p class="text-gray-700 mb-2">Total Majors: {{ $totalMajors }}</p>
                    <a href="{{ route('majors') }}" class="text-blue-500 hover:text-blue-700">View Details</a>
                </div>
            </div>
        </div>
    @endauth
    @guest
        <div class="flex items-center justify-center h-screen">
            <div class=" p-8 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold mb-4">Search</h1>
                <form action="{{ route('results.search') }}" method="GET">
                    @csrf
                    <input type="number" placeholder="Enter your search query" name="id"
                        class="px-4 py-2 rounded-lg bg-gray-200 w-full focus:outline-none focus:shadow-outline mt-4">
                    @if ($errors->has('id'))
                        <div class="text-danger text-red-400">{{ $errors->first('id') }}</div>
                    @endif

                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 mt-4 rounded-lg">Search</button>
                </form>
            </div>
        </div>
    @endguest
@endsection
