@props(['pagination', 'currentPage', 'route'])

@php
    $current = $currentPage;
    $lastPage = $pagination['last_visible_page'];
    $hasNext = $pagination['has_next_page'];

    $start = max(1, $current - 2);
    $end = min($lastPage, $start + 4);

    if ($end - $start < 4) {
        $start = max(1, $end - 4);
    }
@endphp

<nav class="pagination my-6">
    <ul class="flex flex-wrap items-center justify-center space-x-1">
        {{-- First --}}
        @if ($current > 1)
            <li>
                <a href="{{ route($route, ['page' => 1]) }}"
                   class="px-3 py-1.5 text-sm font-medium border rounded-md 
                          bg-white text-gray-600 hover:bg-red-500 hover:text-white 
                          dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-red-700">
                    First
                </a>
            </li>
        @endif

        {{-- Previous --}}
        @if ($current > 1)
            <li>
                <a href="{{ route($route, ['page' => $current - 1]) }}"
                   class="px-3 py-1.5 text-sm font-medium border rounded-md 
                          bg-white text-gray-600 hover:bg-red-500 hover:text-white 
                          dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-red-700">
                    Prev
                </a>
            </li>
        @endif

        {{-- Page Numbers --}}
        @for ($i = $start; $i <= $end; $i++)
            <li>
                <a href="{{ route($route, ['page' => $i]) }}"
                   class="px-3 py-1.5 text-sm font-medium border rounded-md 
                          {{ $i == $current 
                                ? 'bg-red-600 text-white dark:bg-red-700' 
                                : 'bg-white text-gray-600 hover:bg-red-500 hover:text-white dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-red-700' }}">
                    {{ $i }}
                </a>
            </li>
        @endfor

        {{-- Next --}}
        @if ($hasNext)
            <li>
                <a href="{{ route($route, ['page' => $current + 1]) }}"
                   class="px-3 py-1.5 text-sm font-medium border rounded-md 
                          bg-white text-gray-600 hover:bg-red-500 hover:text-white 
                          dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-red-700">
                    Next
                </a>
            </li>
        @endif

        {{-- Last --}}
        @if ($hasNext)
            <li>
                <a href="{{ route($route, ['page' => $lastPage]) }}"
                   class="px-3 py-1.5 text-sm font-medium border rounded-md 
                          bg-white text-gray-600 hover:bg-red-500 hover:text-white 
                          dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-red-700">
                    Last
                </a>
            </li>
        @endif
    </ul>
</nav>
