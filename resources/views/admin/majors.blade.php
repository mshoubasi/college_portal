@extends('layouts.app')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-semibold mb-4">Majors List</h1>
        <table class="min-w-full bg-white border border-gray-200">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="{{ route('major.add') }}">Add Major</a>
            </button>
            <thead>
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subjects</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($majors as $major)
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap"><a href="{{ route('major.details', $major->id) }}">{{ $major->name }}</a></td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $major->subjects->count() }}</td>
                        <td>
                            <form action="{{ route('major.delete', ['id' => $major->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-6 py-4 whitespace-nowrap text-red-400">Delete</button>
                            </form>
                        </td>


                    @empty
                        <td class="px-6 py-4 whitespace-nowrap">No Majors Found</td>
                @endforelse
                </tr>
            </tbody>
        </table>
        {{ $majors->links() }}
    </div>
@endsection
