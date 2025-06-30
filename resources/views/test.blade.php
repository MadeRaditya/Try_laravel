<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Test Page</title>
</head>

<body class="antialiased">
    <div div
        class="relative min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white flex flex-col">

        <x-navbar />

        <div class="relative isolate px-6 pt-14 lg:px-8 flex-grow">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>

            <div class="container mx-auto px-4 py-8 dark:text-white">
                <h1 class="text-2xl font-bold mb-4">Test Page</h1>
                <p class="mb-4">This is a test page to demonstrate the layout and styling.</p>
                <p class="mb-4">You can add more content here as needed.</p>
                <p class="mb-4">Feel free to customize this page according to your requirements </p>
                <p class="mb-4">and test the responsiveness of the design.</p>
                <p class="mb-4">Enjoy testing!</p>
            </div>

            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>

        <x-footer />
    </div>

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