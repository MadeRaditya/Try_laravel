@extends('layout')
@section('title', $data['title'] ?? 'Anime Detail')

@section('content')
@if(isset($error))
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-red-50 dark:bg-red-900/50 border-l-4 border-red-500 p-4">
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
</div>
@else
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
            <div class="p-6 lg:p-8">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Left Column - Image and Basic Info -->
                    <div class="lg:w-1/3">
                        <div class="relative group">
                            <img src="{{ $data['images']['jpg']['image_url'] }}" alt="{{ $data['title'] }}"
                                class="w-full rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 ">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-lg opacity-0 group-hover:opacity-100 group-hover:scale-105 transition-opacity duration-300">
                            </div>
                        </div>

                        <!-- Basic Stats -->
                        <div class="mt-6 space-y-4">
                            <div
                                class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <span class="text-gray-600 dark:text-gray-400">Score</span>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span class="ml-1 font-semibold text-gray-900 dark:text-white">{{ $data['score']
                                        }} / 10</span>
                                </div>
                            </div>

                            <div class="p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 dark:text-gray-400">Rank</span>
                                    <span class="font-semibold text-gray-900 dark:text-white">#{{ $data['rank']
                                        }}</span>
                                </div>
                            </div>

                            <div class="p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 dark:text-gray-400">Popularity</span>
                                    <span class="font-semibold text-gray-900 dark:text-white">#{{
                                        $data['popularity'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Details -->
                    <div class="lg:w-2/3">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ $data['title'] }}</h1>
                        <div class="space-y-1 mb-6">
                            <p class="text-lg text-gray-600 dark:text-gray-400">{{ $data['title_japanese'] }}</p>
                            @if($data['title_english'])
                            <p class="text-lg text-gray-600 dark:text-gray-400">{{ $data['title_english'] }}</p>
                            @endif
                        </div>

                        @if(session('success'))
                        <div class="my-4">
                            <div class=" text-green-700 dark:text-green-200 px-4 py-3" role="alert">
                                {{ session('success') }}
                            </div>
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="my-4">
                            <div class=" text-red-700 dark:text-red-200 px-4 py-3 rounded " role="alert">
                                {{ session('error') }}
                            </div>
                        </div>
                        @endif

                        @if($existingCollection)
                        <div class="my-4">
                            <div class="bg-green-100 dark:bg-green-900/50 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 px-4 py-3 rounded relative"
                                role="alert">
                                <p class="text-sm">You have added this anime to your collection.</p>
                            </div>
                        </div>
                        @else
                        <form method="POST" action="{{ route('collections.store') }}" class="mb-6">
                            @csrf
                            <input type="hidden" name="anime_mal_id" value="{{ $data['mal_id'] }}">
                            <input type="hidden" name="anime_title" value="{{ $data['title'] }}">
                            <input type="hidden" name="anime_image" value="{{ $data['images']['jpg']['image_url'] }}">
                            <input type="hidden" name="user_email" value="{{ Auth::user()->email }}">

                            <button type="submit"
                                class="inline-flex font-semibold items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
                                Add to Collection
                            </button>
                        </form>
                        @endif



                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="space-y-2">
                                <p class="text-gray-700 dark:text-gray-300">
                                    <span class="font-semibold">Type:</span> {{ $data['type'] }}
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    <span class="font-semibold">Episodes:</span> {{ $data['episodes'] }}
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    <span class="font-semibold">Duration:</span> {{ $data['duration'] }}
                                </p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-gray-700 dark:text-gray-300">
                                    <span class="font-semibold">Status:</span> {{ $data['status'] }}
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    <span class="font-semibold">Aired:</span> {{ $data['aired']['string'] }}
                                </p>
                            </div>
                        </div>

                        <!-- Studios -->
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Studios</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($data['producers'] as $producer)
                                <a href="{{ $producer['url'] }}" target="_blank"
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                    {{ $producer['name'] }}
                                </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Genres -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Genres</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($data['genres'] as $genre)
                                <a href="{{ $genre['url'] }}" target="_blank"
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200 hover:bg-red-200 dark:hover:bg-red-900/50 transition-colors duration-200">
                                    {{ $genre['name'] }}
                                </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Synopsis -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Synopsis</h3>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                {{ $data['synopsis'] }}
                            </p>
                        </div>

                        <!-- Streaming Links -->
                        @if(count($data['streaming']) > 0)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Watch On</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($data['streaming'] as $stream)
                                <a href="{{ $stream['url'] }}" target="_blank"
                                    class="inline-flex items-center px-4 py-2 rounded-lg text-sm bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 hover:bg-blue-200 dark:hover:bg-blue-900/50 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $stream['name'] }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Trailer -->
                        @if(isset($data['trailer']['url']))
                        <div>
                            <a href="{{ $data['trailer']['url'] }}" target="_blank"
                                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Watch Trailer
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- comment --}}
    <div class="bg-white dark:bg-gray-800 max-w-7xl mx-auto p-5 my-5">
        <x-comment-input :anime_mal_id="$data['mal_id']" :user_email="Auth::user()->email"
            :username="Auth::user()->name" :anime_title="$data['title']" :parent_id="null" />

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mt-2">
            <h1 class="text-2xl text-center font-bold text-gray-900 dark:text-white sm:text-lg">
                Comment
            </h1>
            <div class="max-w-4xl mx-auto mt-5">
                @foreach ($comments as $comment)
                <x-comment-item :comment="$comment" :anime_mal_id="$data['mal_id']" />
                @endforeach
            </div>

        </div>
    </div>

</div>

@endif

@endsection