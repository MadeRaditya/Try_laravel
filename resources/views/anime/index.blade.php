@extends('layout')

@section('title', 'Anime List')

@section('content')
<div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white sm:text-5xl">
            Anime Collection
        </h1>
        <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
            Discover your next favorite anime series
        </p>
    </div>

    <!-- Search Form -->
    <div class="max-w-2xl mx-auto mb-12">
        <x-search-form />
    </div>

    @if (isset($error))
    <div class="bg-red-50 dark:bg-red-900/50 border-l-4 border-red-500 p-4 mb-8">
        <!-- Error message content -->
        <p class="text-sm text-red-700 dark:text-red-200">{{ $error }}</p>
    </div>
    @else
    <!-- Recomended Anime -->
        @if(isset($recommendedAnime) && count($recommendedAnime) > 0)
            <div class="my-4">
                <h2 class="text-2xl font-bold mb-4 dark:text-white">Recomended Anime</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($recommendedAnime as $anime)
                    <x-anime-card :anime="$anime" />
                    @endforeach
                </div>
            </div>
        @else
            <div class="bg-yellow-50 dark:bg-yellow-900/50 border-l-4 border-yellow-500 p-4 mb-8">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586l-2.293-2.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700 dark:text-yellow-200">No recommended anime available at the moment.</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Top Anime -->
        @if(isset($topAnime) && count($topAnime) > 0)
            <div class="mt-4">
                <div class="dark:text-white mb-4 flex items-center justify-between">
                    <h2 class="text-2xl font-bold">Top Anime</h2>
                    <a href="{{ route('anime.topAnime') }}"
                        class="text-sm font-semibold underline hover:text-red-600 dark:hover:text-red-700 transition-all duration-300">
                        See more<span aria-hidden="true" class=" text-2xl font-bold">→</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($topAnime as $anime)
                    <x-anime-card :anime="$anime" />
                    @endforeach
                </div>
            </div>
            @else
            <div class="bg-yellow-50 dark:bg-yellow-900/50 border-l-4 border-yellow-500 p-4 mb-8">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586l-2.293-2.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700 dark:text-yellow-200">No Top anime available at the moment.</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- New Anime -->
        @if(isset($newAnime) && count($newAnime) > 0)
            <div class="mt-4">
                <div class="dark:text-white mb-4 flex items-center justify-between">
                    <h2 class="text-2xl font-bold">New Anime</h2>
                    <a href="{{ route('anime.newAnime') }}"
                        class="text-sm font-semibold underline hover:text-red-600 dark:hover:text-red-700 transition-all duration-300">
                        See more<span aria-hidden="true" class=" text-2xl font-bold">→</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($newAnime as $anime)
                    <x-anime-card :anime="$anime" />
                    @endforeach
                </div>
            </div>
            @else
            <div class="bg-yellow-50 dark:bg-yellow-900/50 border-l-4 border-yellow-500 p-4 mb-8">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586l-2.293-2.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700 dark:text-yellow-200">No New anime available at the moment.</p>
                    </div>
                </div>
            </div>
        @endif

    @endif
</div>
@endsection