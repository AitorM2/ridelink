<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RideLink') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="min-h-screen flex items-center justify-center bg-green-50 py-12 px-6 sm:px-12">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg border border-green-200">

        <div class="flex items-center justify-center mb-6">
            <img src="{{ asset('img/ridelink_logo.png') }}" alt="Logo" class="h-10 w-10 mr-3">
            <span class="text-2xl font-semibold text-green-800">RideLink</span>
        </div>

        <h1 class="text-3xl font-semibold text-green-800 text-center mb-6">
            {{ __('Iniciar Sesión') }}
        </h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-sm text-green-700" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Correo -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-green-900 mb-1">
                    {{ __('Correo electrónico') }}
                </label>
                <input id="email" name="email" type="email" required autofocus autocomplete="username"
                    value="{{ old('email') }}"
                    class="w-full border border-green-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 transition duration-150 ease-in-out" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Contraseña -->
            <div class="mb-4 relative">
                <label for="password" class="block text-sm font-medium text-green-900 mb-1">
                    {{ __('Contraseña') }}
                </label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                    class="w-full border border-green-300 rounded-md shadow-sm px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 transition duration-150 ease-in-out" />
                <button type="button" id="togglePassword" tabindex="-1" class="absolute right-3 top-9 text-green-600 focus:outline-none"
                    style="background: none; border: none; padding: 0;">
                    <i class="fa-solid fa-eye" id="eyeIcon"></i>
                </button>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const passwordInput = document.getElementById('password');
                    const togglePassword = document.getElementById('togglePassword');
                    const eyeIcon = document.getElementById('eyeIcon');
                    togglePassword.addEventListener('click', function () {
                        const type = passwordInput.type === 'password' ? 'text' : 'password';
                        passwordInput.type = type;
                        eyeIcon.classList.toggle('fa-eye');
                        eyeIcon.classList.toggle('fa-eye-slash');
                    });
                });
            </script>

            <!-- Recordarme -->
            <div class="flex items-center mb-6">
                <input id="remember_me" name="remember" type="checkbox"
                    class="rounded border-green-300 text-green-600 shadow-sm focus:ring-green-400">
                <label for="remember_me" class="ml-2 block text-sm text-green-800">
                    {{ __('Recuérdame') }}
                </label>
            </div>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-green-700 hover:text-green-900 underline transition"
                        href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-150">
                    {{ __('Iniciar sesión') }}
                </button>
            </div>
        </form>
    </div>
</div>