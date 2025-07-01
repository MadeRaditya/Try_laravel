@extends('layout')
@section('title', 'New Anime')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white sm:text-5xl">
                    New Anime
                </h1>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                    Discover the latest anime series and movies, <br />
                    and be updated regularly to keep you in the loop with
                    the latest trends in the anime world.
                </p>
            </div>

            <!-- Search Form -->
            <div class="max-w-2xl mx-auto mb-12">
                <x-search-form />
            </div>

            <!-- Error Message -->
            @if (isset($error))
            <div class="bg-red-50 dark:bg-red-900/50 border-l-4 border-red-500 p-4 mb-8">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700 dark:text-red-200">{{ $error }}</p>
                    </div>
                </div>
            </div>
            @else
            <!-- Anime Grid -->
            <div class="mt-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($newAnime as $anime)
                    <x-anime-card :anime="$anime" />
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>

    <x-pagination :pagination="$pagination" :currentPage="$page" route="anime.newAnime" />
@endsection