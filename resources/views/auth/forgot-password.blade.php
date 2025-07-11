@extends('layout')

@section('title', 'Forgot Password')

@section('content')
<div class="flex justify-center items-center py-20 px-4 min-h-screen">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white">
                Forgot Password
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                Enter your email to reset your password
            </p>
        </div>

        @if (session('status'))
            <div class="mb-4 text-green-600 dark:text-green-400 text-sm font-medium">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Email Address
                </label>
                <input type="email" name="email" id="email" placeholder="you@example.com"
                    class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('email') }}" required>
                @error('email')
                    <p class="mt-1 text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300">
                Send Reset Link
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:underline">
                Back to Login
            </a>
        </div>
    </div>
</div>
@endsection
