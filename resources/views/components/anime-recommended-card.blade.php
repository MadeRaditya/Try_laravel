
@props(['entry', 'content', 'user'])

<div class="card group">
    <div class="block">
        <div class="relative overflow-hidden">
            <img src="{{ $entry['images']['jpg']['image_url'] }}"
                 alt="{{ $entry['title'] }}"
                 class="w-full h-72 object-cover transform group-hover:scale-105 transition-transform duration-300">
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-gray-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors duration-200">
                {{ $entry['title'] }}
            </h3>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Recommended by <span class="font-semibold">{{ $user['username'] }}</span>
            </p>
            <p class="mt-1 text-sm italic text-gray-500 dark:text-gray-400">
                "{{ $content }}"
            </p>
        </div>
    </div>
</div>
