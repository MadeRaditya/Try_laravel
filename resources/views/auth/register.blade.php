@extends('layout')
@section('title', 'Register Page')

@section('content')
<div class="flex justify-center items-center py-20 px-4 min-h-screen">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8">
         @auth
            <p class="text-center text-red-600 dark:text-red-400 text-lg">
                You already logged in as <span class="font-semibold">{{ auth()->user()->name }}</span>, please logout first.<br>
                Redirecting to dashboard in <span id="countdown">3</span> seconds...
            </p>

            <script>
                let seconds = 3;
                const countdownEl = document.getElementById('countdown');
                const interval = setInterval(() => {
                    seconds--;
                    countdownEl.textContent = seconds;
                    if (seconds <= 0) {
                        clearInterval(interval);
                        window.location.href = "{{ route('dashboard') }}";
                    }
                }, 1000);
            </script>
        @else
        <div class="text-center mb-8">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white">
                Create an Account
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                Join us and explore new possibilities!
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Full Name
                </label>
                <input type="text" name="name" id="name" placeholder="John Doe"
                    class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Email Address
                </label>
                <input type="email" name="email" id="email" placeholder="you@example.com"
                    class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div>
                <label for="password" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Password
                </label>
                <input type="password" name="password" id="password" placeholder="Create a password"
                    class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div>
                <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Confirm Password
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password"
                    class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{route('login')}}" class="text-sm text-gray-700 dark:text-gray-300">Alredy have Account?
                <span class="font-bold text-blue-600 hover:text-blue-700 hover:underline">Login</span>
                </a>
            </div>

            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300">
                Register
            </button>
        </form>
        @endauth
    </div>
</div>
@endsection
