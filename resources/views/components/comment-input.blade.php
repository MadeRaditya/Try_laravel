@props(['anime_mal_id', 'user_email', 'username', 'comment', 'anime_title', 'parent_id'])

<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mt-6">
    <form method="POST" action="{{ route('comment.store') }}">
        @csrf

        <input type="hidden" name="anime_mal_id" value="{{ $anime_mal_id }}">
        <input type="hidden" name="user_email" value="{{ $user_email }}">
        <input type="hidden" name="username" value="{{ $username }}">
        @if ($parent_id)
            <input type="hidden" name="parent_id" value="{{ $parent_id }}">
        @endif
        <input type="hidden" name="anime_title" value="{{ $anime_title }}">

        <div class="mb-4">
            <label for="comment" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">
                Write your comment:
            </label>
            <textarea name="comment" rows="4" required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring focus:border-red-400"
                placeholder="Write a comment..."></textarea>
        </div>

        <div class="text-right">
            <button type="submit"
                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition duration-200">
                Post Comment
            </button>
        </div>
    </form>
</div>
