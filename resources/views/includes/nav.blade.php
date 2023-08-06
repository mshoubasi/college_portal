<nav class="bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="text-white text-xl font-semibold">College Portal</a>
            </div>
            <div class="flex items-center">
                @guest
                <a href="{{ route('login-view') }}">
                    <button
                    class="px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus:shadow-outline">Admin
                    Login</button>
                </a>
                @else
                <p class="text-white font-bold py-2 px-4 rounded">
                    {{ Auth::user()->name }}
                </p>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        @method('POST')
                        <a href="{{ route('logout') }}">Logout</a>
                    </form>

                </button>
                @endif
            </div>
        </div>
    </div>
</nav>
