@props(['anime'])

<div class="card group">
    <a href="{{ route('anime.detail',['id'=>$anime['mal_id']]) }}" class="block">
        <div class="relative overflow-hidden">
            <img src="{{ $anime['images']['jpg']['image_url'] }}"
                 alt="{{ $anime['title'] }}"
                 class="w-full h-72 object-cover transform group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <p class="text-white text-sm">
                        {{ $anime['type'] ?? '' }} • {{ $anime['episodes'] ?? '?' }} eps
                    </p>
                    <div class="flex items-center mt-2">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="..." />
                        </svg>
                        <span class="ml-1 text-white">{{ $anime['score'] ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-gray-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors duration-200">
                {{ $anime['title'] }}
            </h3>
        </div>
    </a>
</div>
