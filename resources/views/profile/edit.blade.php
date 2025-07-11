@extends('layout')

@section('title', 'Edit Profile')

@section('content')
<div class="flex justify-center items-center py-20 px-4 min-h-screen">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white">
                Edit Profile
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                Update your profile information below.
            </p>
        </div>

        @if (session('success'))
            <div class="mb-4 text-sm font-medium text-green-700 bg-green-100 border border-green-200 rounded-lg p-3 dark:text-green-300 dark:bg-green-900/30 dark:border-green-800">
                {{ session('success') }} <br>
                Redirecting to your profile in <span id="countdown">3</span> seconds...
            </div>
            <script>
                let seconds = 3;
                const countdownEl = document.getElementById('countdown');

                const interval = setInterval(() => {
                    seconds--;
                    countdownEl.textContent = seconds;
                    if(seconds <= 0){
                        clearInterval(interval);
                        window.location.href = "{{ route('profile.index') }}";
                    }
                }, 1000);
            </script>
        @endif

        <div class="mb-6 flex justify-center">
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover">
            @else
                <div class="w-24 h-24 flex items-center justify-center rounded-full bg-gray-300 text-xl text-white font-semibold dark:bg-gray-700">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
        </div>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Name
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                    class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Email Address
                </label>
                <input type="email" id="email" value="{{ $user->email }}" disabled
                    class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 cursor-not-allowed">
            </div>

            <div>
                <label for="profile_picture" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Profile Picture
                </label>
                <input type="file" name="profile_picture" id="profile_picture" accept="image/*"
                    class="w-full text-sm text-gray-700 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-600 file:text-white hover:file:bg-green-700 transition-all duration-300">
            </div>

            <div>
                <label for="oldPassword" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Old Password <span class="text-xs text-gray-500 dark:text-gray-400">(Leave blank if not changing)</span>
                </label>
                <div class="relative">
                    <input type="password" name="oldPassword" id="oldPassword"
                        class="w-full px-4 py-2 pr-10 text-base border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Enter your current password">
                    <button type="button" onclick="togglePassword('oldPassword', this)"
                        class="absolute right-2 top-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white focus:outline-none">
                        👁️
                    </button>
                </div>
            </div>

            <div>
                <label for="newPassword" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                    New Password <span class="text-xs text-gray-500 dark:text-gray-400">(Leave blank if not changing)</span>
                </label>
                <div class="relative">
                    <input type="password" name="newPassword" id="newPassword"
                        class="w-full px-4 py-2 pr-10 text-base border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Enter new password">
                    <button type="button" onclick="togglePassword('newPassword', this)"
                        class="absolute right-2 top-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white focus:outline-none">
                        👁️
                    </button>
                </div>
            </div>


            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300">
                Save Changes
            </button>
        </form>
        <div class="mt-6">
            <a href="{{ route('profile.index') }}"
            class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300">
        Cancel
        </a>
        </div>
    </div>
</div>

<script>
    function togglePassword(fieldId, button) {
        const input = document.getElementById(fieldId);
        const isPassword = input.getAttribute("type") === "password";
        input.setAttribute("type", isPassword ? "text" : "password");
        button.textContent = isPassword ? "🔒️" : "👁️";
    }
</script>

@endsection
