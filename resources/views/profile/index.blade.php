@extends('layout')

@section('title', 'My Profile')

@section('content')
<div class="flex justify-center items-center py-20 px-4 min-h-screen">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 text-center">
        <div class="mb-6">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white">
                My Profile
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                View your personal information
            </p>
        </div>

        <div class="mb-6 flex justify-center">
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover shadow">
            @else
                <div class="w-24 h-24 flex items-center justify-center rounded-full bg-gray-300 text-xl text-white font-semibold dark:bg-gray-700">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
        </div>

        <div class="space-y-2 text-gray-800 dark:text-gray-200 text-left">
            <p><span class="font-semibold">Name:</span> {{ $user->name }}</p>
            <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('profile.edit') }}"
                class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300">
                Edit Profile
            </a>
        </div>
    </div>
</div>
@endsection
