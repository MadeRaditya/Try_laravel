@props(['collection'])

<div class="card group bg-gray-200 dark:bg-gray-700 shadow-lg border border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden">
    <a href="{{ route('anime.detail', ['id' => $collection->anime_mal_id]) }}" class="block">
        <div class="relative overflow-hidden">
            <img src="{{ $collection->anime_image }}"
                 alt="{{ $collection->anime_title }}"
                 class="w-full h-72 object-cover transform group-hover:scale-105 transition-transform duration-300">
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-gray-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors duration-200">
                {{ $collection->anime_title }}
            </h3>
        </div>
    </a>
</div>
