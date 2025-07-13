@extends('layout')
@section('title', 'Dashboard')

@section('content')
<div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 min-h-screen">
    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
        <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-4">
            Welcome, {{ auth()->user()->name }}
        </h1>

        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
            Your Collection
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 my-4">
            @foreach ($collections as $collection)
            <x-collection-card :collection="$collection" />
            @endforeach
        </div>

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