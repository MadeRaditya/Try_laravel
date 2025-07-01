@extends('layout')

@section('title', 'To Do List' )

@section('content')
<div class="w-full min-h-screen mb-10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white">To Do List</h1>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">Manage your daily tasks</p>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden">
            <div class="p-6">
                <!-- Alert Messages -->
                @if(session('success'))
                <div
                    class="mb-4 p-4 bg-green-50 dark:bg-green-900/30 rounded-xl border border-green-200 dark:border-green-800">
                    <div class="flex">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="ml-3 text-sm text-green-700 dark:text-green-200">{{ session('success') }}</p>
                    </div>
                </div>
                @endif

                <!-- Add Task Form -->
                <form action="{{ route('todo.post') }}" method="post" class="mb-8">
                    @csrf
                    <div class="flex gap-3">
                        <input type="text"
                            class="w-full px-4 py-3 rounded-xl bg-gray-200 dark:bg-gray-700/50 border-0 focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 dark:text-gray-200 text-gray-900 dark:placeholder-gray-500"
                            name="task" placeholder="What needs to be done?" required>
                        <button type="submit"
                            class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-colors duration-200">
                            Add
                        </button>
                    </div>
                </form>

                <!-- Tasks List -->
                <div class="space-y-3 max-h-[400px] overflow-y-auto">
                    @if($data->isNotEmpty())
                        @foreach ($data as $item)
                        <div
                            class="group flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:shadow-md transition-all duration-200">
                            <div class="flex items-center gap-4">
                                <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="POST"
                                    class="flex items-center">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="task" value="{{ $item->task }}">
                                    <input type="hidden" name="is_done" value="{{ $item->is_done == '1' ? '0' : '1' }}">
                                    <button type="submit"
                                        class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 {{ $item->is_done == '1' ? 'bg-red-500 border-red-500' : '' }} hover:border-red-500 transition-colors duration-200">
                                        @if($item->is_done == '1')
                                        <svg class="w-full h-full text-white" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        @endif
                                    </button>
                                </form>
                                <span
                                    class="{{ $item->is_done == '1' ? 'line-through text-gray-400 dark:text-gray-500' : 'text-gray-900 dark:text-white' }}">
                                    {{ $item->task }}
                                </span>
                            </div>

                            <form action="{{ route('todo.delete', ['id' => $item->id]) }}" method="POST"
                                class="opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="p-2 text-gray-400 hover:text-red-600 dark:text-gray-500 dark:hover:text-red-400 rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        @endforeach
                    @else
                        <div class="p-4 bg-yellow-50 dark:bg-yellow-900/50 rounded-xl">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586l-2.293-2.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-3 text-sm text-yellow-700 dark:text-yellow-200">No tasks available. <br/>
                                add tasks to get started!
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection