@extends('layouts.app')
@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-10 rounded shadow-md w-1/3">
            <h2 class="text-2xl font-semibold mb-4">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700" for="email">
                        Email:
                    </label>
                    <input class="border bg-gray-200 border-gray-300 py-2 px-4 rounded-lg w-full" id="email"
                        type="email" placeholder="Email" name="email" required autofocus>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="password">
                        Password:
                    </label>
                    <input class="border bg-gray-200 border-gray-300 py-2 px-4 rounded-lg w-full" id="password"
                        type="password" placeholder="Password" name="password" required>
                </div>
                @if ($errors->has('email'))
                <div class="text-danger text-red-400">{{ $errors->first('email') }}</div>
            @endif
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
