<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime List</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased min-h-screen bg-dots-darker bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">
    <!-- Navbar -->
    <x-navbar/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
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
                <form method="GET" action="{{ route('anime.index') }}" class="flex gap-4">
                    <input type="text" name="search"
                           placeholder="Search for anime..."
                           value="{{ request()->query('search') }}"
                           class="input flex-1 px-4 py-3 text-base">
                    <button type="submit" class="btn-primary">
                        Search
                    </button>
                </form>
            </div>

            <!-- Search Results -->
            @if(isset($search) && $search)
                <div class="text-center mb-8">
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                        Search results for: <span class="font-semibold text-red-600 dark:text-red-400">{{ $search }}</span>
                    </p>
                </div>
            @endif

            <!-- Error Message -->
            @if (isset($error))
                <div class="bg-red-50 dark:bg-red-900/50 border-l-4 border-red-500 p-4 mb-8">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 dark:text-red-200">{{ $error }}</p>
                        </div>
                    </div>
                </div>
            @else
                <!-- Anime Grid -->
                <!-- Top Anime -->
                <div class="mt-4">
                    <h2 class="text-2xl font-bold mb-4 text-white">Top Anime</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($topAnime as $anime)
                            <x-anime-card :anime="$anime"/>
                        @endforeach
                    </div>
                </div>

                <!-- Recomended Anime -->
                <div class="mt-4">
                    <h2 class="text-2xl font-bold mb-4 text-white">Recomended Anime</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($recommendedAnime as $anime)
                            <x-anime-card :anime="$anime" />
                        @endforeach
                    </div>
                </div>

                <!-- Random Anime -->
                <div class="mt-4">
                    <h2 class="text-2xl font-bold mb-4 text-white">Random Anime</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($randomAnime as $anime)
                            <x-anime-card :anime="$anime"/>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <x-footer/>

    <script>
         document.querySelector('.mobile-menu-button').addEventListener('click', function() {
                document.querySelector('#mobile-menu').classList.toggle('hidden');
            });
        // Check if theme is set in localStorage
        const theme = localStorage.getItem('theme');

        // If theme is not set, check system preference
        if (!theme) {
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        } else {
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }

        function updateThemeIcons() {
                const isDark = document.documentElement.classList.contains('dark');
                document.querySelectorAll('.theme-toggle').forEach(button => {
                    const darkIcon = button.querySelector('.theme-toggle-dark-icon');
                    const lightIcon = button.querySelector('.theme-toggle-light-icon');

                    if (isDark) {
                        lightIcon.classList.remove('hidden');
                        darkIcon.classList.add('hidden');
                    } else {
                        lightIcon.classList.add('hidden');
                        darkIcon.classList.remove('hidden');
                    }
                });
            }

            // Initial icon state
            updateThemeIcons();


            // Add click handlers to all theme toggle buttons
            document.querySelectorAll('.theme-toggle').forEach(button => {
                button.addEventListener('click', function() {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    }
                    updateThemeIcons();
                });
            });
    </script>
</body>
</html>
