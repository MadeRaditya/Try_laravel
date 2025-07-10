@extends('layout')
@section('title', 'Dashboard')

@section('content')
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-4">
                Welcome, {{ auth()->user()->name }}
            </h1>

            <p class="text-gray-700 dark:text-gray-300 mb-6">
                You are logged in. Explore the features available on your dashboard.
            </p>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg shadow transition duration-300">
                    Logout
                </button>
            </form>
        </div>
    </div>
@endsection
