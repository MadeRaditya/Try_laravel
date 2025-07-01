<form method="GET" action="{{ route('anime.searchAnime') }}" class="flex gap-4 ">
    <input type="text" name="search" placeholder="Search for anime..." value="{{ request()->query('search') }}"
        class="input flex-1 px-4 py-3 text-base borderborder-gray-200 dark:border-gray-700">
    <button type="submit" class="btn-primary">
        Search
    </button>
</form>