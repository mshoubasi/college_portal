@extends('layouts.app')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-semibold mb-4">Students List</h1>
        <form action="{{ route('search') }}" method="GET" class="flex items-center py-3">
            <input type="text" name="q" placeholder="Search students..."
                class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
            <button type="submit"
                class="px-4 py-2 bg-blue-500 text-white font-medium rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Search</button>
        </form>
        <button class="px-4 py-2 bg-blue-500 text-white font-medium rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <a href="{{ route('students') }}">Back</a>
        </button>

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Major</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($search as $student)
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->gender }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->major->name }}</td>
                    </tr>
                @empty
                    <td class="px-6 py-4 whitespace-nowrap">No Student Found</td>
                @endforelse
            </tbody>
        </table>
        {{ $search->links() }}
    </div>
@endsection
