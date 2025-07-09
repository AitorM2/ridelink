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

        <!-- Logo + Nombre App (opcional, como en login) -->
        <div class="flex items-center justify-center mb-6">
            <img src="{{ asset('img/ridelink_logo.png') }}" alt="Logo" class="h-10 w-10 mr-3">
            <span class="text-2xl font-semibold text-green-800">RideLink</span>
        </div>

        <!-- Título -->
        <h2 class="text-xl text-center text-green-800 font-semibold mb-4">
            {{ __('¿Olvidaste tu contraseña?') }}
        </h2>

        <!-- Descripción -->
        <p class="mb-6 text-sm text-green-900 text-center leading-relaxed">
            {{ __('No hay problema. Indícanos tu correo y te enviaremos un enlace para que puedas establecer una nueva contraseña.') }}
        </p>

        <!-- Estado de sesión -->
        <x-auth-session-status class="mb-4 text-sm text-green-700" :status="session('status')" />

        <!-- Formulario -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Correo -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-green-900 mb-1">
                    {{ __('Correo electrónico') }}
                </label>
                <input id="email" name="email" type="email" required autofocus value="{{ old('email') }}"
                    class="w-full border border-green-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 transition duration-150 ease-in-out" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Botón -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-150">
                    {{ __('Enviar enlace de recuperación') }}
                </button>
            </div>
        </form>
    </div>
</div>