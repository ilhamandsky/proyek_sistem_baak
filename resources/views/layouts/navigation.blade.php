<nav class="bg-white border-b border-gray-200 px-4 py-3 shadow">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="text-lg font-semibold">
            <a href="{{ route('dashboard') }}">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <div class="flex items-center space-x-4">
            @auth
                <span>{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Login</a>
            @endauth
        </div>
    </div>
</nav>
