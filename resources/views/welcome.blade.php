<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <!-- Navbar -->
            <x-navbar/>

            <!-- Hero Section -->
            <div class="relative isolate px-6 pt-14 lg:px-8">
                <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                    <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                </div>

                <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                    <div class="text-center">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">Welcome to Laravel</h1>
                        <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">Explore our features including Todo List, Anime Collection, and more!</p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="{{ route('todo') }}" class="rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Get started</a>
                            <a href="/anime" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Explore Anime <span aria-hidden="true">→</span></a>
                        </div>
                    </div>
                </div>

                <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
                    <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                </div>
            </div>

            <!-- Feature Grid -->
            <div class="py-24 sm:py-32">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:text-center">
                        <h2 class="text-base font-semibold leading-7 text-red-600">Features</h2>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">Everything you need</p>
                        <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">Explore our comprehensive set of features designed to enhance your experience.</p>
                    </div>
                    <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                        <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                            <!-- Todo Feature -->
                            <div class="flex flex-col">
                                <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900 dark:text-white">
                                    <svg class="h-5 w-5 flex-none text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" />
                                    </svg>
                                    Todo List
                                </dt>
                                <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600 dark:text-gray-300">
                                    <p class="flex-auto">Manage your tasks efficiently with our intuitive todo list feature.</p>
                                    <p class="mt-6">
                                        <a href="{{ route('todo') }}" class="text-sm font-semibold leading-6 text-red-600">Learn more <span aria-hidden="true">→</span></a>
                                    </p>
                                </dd>
                            </div>
                            <!-- Anime Feature -->
                            <div class="flex flex-col">
                                <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900 dark:text-white">
                                    <svg class="h-5 w-5 flex-none text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z" />
                                    </svg>
                                    Anime Collection
                                </dt>
                                <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600 dark:text-gray-300">
                                    <p class="flex-auto">Explore our vast collection of anime series and movies.</p>
                                    <p class="mt-6">
                                        <a href="/anime" class="text-sm font-semibold leading-6 text-red-600">Learn more <span aria-hidden="true">→</span></a>
                                    </p>
                                </dd>
                            </div>
                            <!-- Halo Feature -->
                            <div class="flex flex-col">
                                <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900 dark:text-white">
                                    <svg class="h-5 w-5 flex-none text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                                        <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                    Halo Feature
                                </dt>
                                <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600 dark:text-gray-300">
                                    <p class="flex-auto">Discover more about our Halo feature and what it offers.</p>
                                    <p class="mt-6">
                                        <a href="{{ route('halo') }}" class="text-sm font-semibold leading-6 text-red-600">Learn more <span aria-hidden="true">→</span></a>
                                    </p>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <x-footer/>
        </div>

        <!-- Mobile Menu Script -->
        <script>
            // Mobile menu toggle
            document.querySelector('.mobile-menu-button').addEventListener('click', function() {
                document.querySelector('#mobile-menu').classList.toggle('hidden');
            });

            // Theme handling
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
                // Apply saved theme
                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }

            // Function to update all theme toggle buttons
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
