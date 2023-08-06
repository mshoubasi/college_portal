@extends('layouts.app')
@section('content')
    <div class="flex justify-center items-center pt-10">
        <form action="{{ route('major.add.subject', $major->id) }}" method="POST">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Subject Name</label>
                <div class="mt-1">
                    <input id="name" name="name" type="text"
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
                @if ($errors->has('name'))
                    <div class="text-danger text-red-400">{{ $errors->first('name') }}</div>
                @endif

            </div>

            <div>
                <button type="submit"
                    class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Subject
                </button>
            </div>
        </form>
    </div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <button
            class=" px-4 py-2 bg-blue-500 text-white font-medium rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <a href="{{ route('majors') }}">Back</a>
        </button>
        <table class="min-w-full bg-white border border-gray-200">

            <thead>
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($major->subjects as $subject)
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $subject->name }}</td>

                        <td class="px-6 py-4 whitespace-nowrap"></td>
                    @empty
                        <td class="px-6 py-4 whitespace-nowrap">No Subjects</td>
                @endforelse
                </tr>
            </tbody>
        </table>
    </div>
@endsection
