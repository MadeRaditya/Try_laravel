<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" flex flex-col antialiased min-h-screen bg-dots-darker bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">
    <x-navbar />

    <div class="py-12 flex-grow">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
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
                                class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 border-0 focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400"
                                name="task" placeholder="What needs to be done?" required>
                            <button type="submit"
                                class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-colors duration-200">
                                Add
                            </button>
                        </div>
                    </form>

                    <!-- Tasks List -->
                    <div class="space-y-3">
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
                    </div>
                </div>
            </div>

            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </div>

    <x-footer />

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


{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- 00. Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid col-md-7">
            <div class="navbar-brand">Simple To Do List</div>
            <!--
            <div class="navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Akun Saya
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                            <li><a class="dropdown-item" href="#">Update Data</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        -->
        </div>
    </nav>

    <div class="container mt-4">
        <!-- 01. Content-->
        <h1 class="text-center mb-4">To Do List</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- 02. Form input data -->
                        <form id="todo-form" action="{{route('todo.post')}}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="task" id="todo-input"
                                    placeholder="Tambah task baru" required value="{{old(" task")}}">
                                <button class="btn btn-primary" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- 03. Searching -->
                        <form id="todo-form" action="{{route('todo')}}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{request('search')}}"
                                    placeholder="masukkan kata kunci">
                                <button class="btn btn-secondary" type="submit">
                                    Cari
                                </button>
                            </div>
                        </form>

                        <ul class="list-group mb-4" id="todo-list">
                            @foreach ($data as $item)
                            <!-- 04. Display Data -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="task-text">
                                    {!!$item->is_done == '1'?'<del>':""!!}
                                        {{$item->task}}
                                        {!!$item->is_done == '1'?'</del>':""!!}
                                </span>
                                <input type="text" class="form-control edit-input" style="display: none;"
                                    value="{{$item->task}}">
                                <div class="btn-group">
                                    <form action="{{route('todo.delete',[" id"=>$item->id])}}" method="POST"
                                        onsubmit="return confirm('Yakin Menghapus task ini ?')">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm delete-btn">✕</button>
                                    </form>
                                    <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{$loop->index}}" aria-expanded="false">✎</button>
                                </div>
                            </li>
                            <!-- 05. Update Data -->
                            <li class="list-group-item collapse" id="collapse-{{$loop->index}}">
                                <form action="{{route('todo.update',['id'=>$item->id])}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="task" value="{{$item->task}}">
                                            <button class="btn btn-outline-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="radio px-2">
                                            <label>
                                                <input type="radio" value="1" name="is_done" {{$item->is_done ==
                                                "1"?"checked":"" }}> Selesai
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="0" name="is_done" {{$item->is_done ==
                                                "0"?"checked":"" }}> Belum
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </li>

                            @endforeach
                        </ul>
                        {{$data->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html> --}}