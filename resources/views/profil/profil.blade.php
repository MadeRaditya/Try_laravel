<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Profile</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased min-h-screen bg-dots-darker bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 transition-colors duration-200">
    <x-navbar/>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Profile Section -->
                <div class="text-center mb-12">
                    <div class="relative inline-block">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix"
                             alt="Profile"
                             class="w-32 h-32 rounded-full ring-4 ring-red-500 dark:ring-red-400 mb-4 transition-colors duration-200">
                        <div class="absolute bottom-4 right-0 bg-green-500 w-4 h-4 rounded-full border-2 border-white dark:border-gray-900 transition-colors duration-200"></div>
                    </div>
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white transition-colors duration-200">{{ $biodata['nama'] }}</h1>
                    <p class="mt-2 text-lg text-gray-600 dark:text-gray-400 transition-colors duration-200">
                        {{ $biodata['npm']  }}
                    </p>
                    <p class="mt-2 text-lg text-gray-600 dark:text-gray-400 transition-colors duration-200">Full Stack Developer</p>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl transition-colors duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Projects</p>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{$biodata['project']}}</h3>
                            </div>
                            <div class="p-3 bg-red-100 dark:bg-red-900/30 rounded-xl">
                                <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl transition-colors duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Experience</p>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{$biodata['experience']}}</h3>
                            </div>
                            <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-xl">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl transition-colors duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Skills</p>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{$biodata['skill']}}</h3>
                            </div>
                            <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-xl">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Skills Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl transition-colors duration-200">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Technical Skills</h2>
                        <div class="space-y-4">
                            @foreach($skills as $skill)
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{$skill['name']}}</span>
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{$skill['percentage']}}</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700">
                                        <div class="bg-red-600 h-2 rounded-full" style="width:{{ $skill['percentage'] }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl transition-colors duration-200">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Current Projects</h2>
                        <div class="space-y-4">
                            @foreach($projects as $project)
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 flex items-center justify-center bg-{{ $project['icon'] }}-100 dark:bg-{{ $project['icon'] }}-900/30 rounded-xl">
                                            <span class="text-{{ $project['icon'] }}-600 dark:text-{{ $project['icon'] }}-400 font-bold text-lg">
                                                {{ strtoupper(substr($project['title'], 0, 1)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $project['title'] }}</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $project['description'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl transition-colors duration-200">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Let's Connect</h2>
                    <div class="flex justify-center space-x-6">
                        <a href="{{ $socials['github'] }}" target="_blank" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <span class="sr-only">GitHub</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="{{ $socials['linkedin'] }}" target="_blank" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <span class="sr-only">LinkedIn</span>

                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                        <a href="{{ $socials['twitter'] }}" target="_blank" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <x-footer/>

        <!-- Add before closing body tag -->
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
