@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-4">Search Results</h1>


            <!-- Search Results (Sample) -->
            <div class="mt-8">
                <h2 class="text-xl font-bold mb-4">Search Results:</h2>
                @if (!empty($search))
                    <ul>
                        <li class="mb-4">
                            <h3 class="text-lg font-semibold">Name:</h3>
                            <p class="text-gray-700">{{ $search->name }}</p>
                        </li>
                        <li class="mb-2">
                            <h3 class="text-lg font-semibold">ID:</h3>
                            <p class="text-gray-700">{{ $search->college_id }}</p>
                        </li>
                        <li class="mb-2">
                            <h3 class="text-lg font-semibold">Major:</h3>
                            <p class="text-gray-700">{{ $search->major->name }}</p>
                        </li>
                        <tbody>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <table class="min-w-full bg-white border border-gray-200">
                                        <tr>
                                            <th
                                                class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Subjects:</th>
                                        </tr>
                                        <tr>
                                        <tr>
                                            @foreach ($search->major->subjects as $subject)
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $subject->name }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            @foreach ($search->major->subjects as $subject)
                                                @php
                                                    $grade = $search->grades->where('subject_id', $subject->id)->first();
                                                @endphp
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $grade ? $grade->grade : '' }}
                                                </td>
                                            @endforeach
                                        </tr>
                            </tr>
                            </table>
                            </td>
                            </tr>
                        </tbody>
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
