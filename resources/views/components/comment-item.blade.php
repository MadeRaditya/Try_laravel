@props(['comment', 'anime_mal_id'])

<div class="mb-4 ml-{{ $comment->parent_id ? '8' : '0' }}">
    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow-sm">
        <div class="flex justify-between items-center">
            <div>
                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $comment->username }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
        </div>
        <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $comment->comment }}</p>

        <div x-data="{ openReply: false }">
            <button @click="openReply = !openReply" class="text-red-600 hover:underline">Reply</button>

            <div x-show="openReply" class="mt-2">
                <x-comment-input :anime_mal_id="$anime_mal_id" :user_email="Auth::user()->email"
                    :username="Auth::user()->name" :anime_title="$comment->anime_title" :parent_id="$comment->id" />
            </div>
        </div>

    </div>

    @if ($comment->replies->count())
    <div class="mt-2 space-y-2">
        @foreach ($comment->replies as $reply)
        <x-comment-item :comment="$reply" :anime_mal_id="$anime_mal_id" />
        @endforeach
    </div>
    @endif
</div>